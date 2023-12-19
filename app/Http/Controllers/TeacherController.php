<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class TeacherController extends Controller
{

    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function index()
    {
        return view('teacher.index', [
            'teachers' => Teacher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required', 'in:male,female'],
            'photo_left' => ['nullable', 'image','mimes:jpeg,jpg,png,svg','max:2048'],
            'photo_right' => ['nullable', 'image','mimes:jpeg,jpg,png,svg','max:2048'],
        ]);

        $teacher = Teacher::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'qualifications' => $request->qualifications,
        ]);

        if ($request->hasFile('photo_left')) {
            $photo_left = Str::slug($teacher->name).'_photo_l_'.$teacher->id.'.'.$request->photo_left->getClientOriginalExtension();
            $request->photo_left->move(public_path('teachers'), $photo_left);
        } else {
            $photo_left = 'placeholder_l.svg';
        }

        if ($request->hasFile('photo_right')) {
            $photo_right = Str::slug($teacher->name).'_photo_r_'.$teacher->id.'.'.$request->photo_right->getClientOriginalExtension();
            $request->photo_right->move(public_path('teachers'), $photo_right);
        } else {
            $photo_right = 'placeholder_l.svg';
        }

        $teacher->photo_left = $photo_left;
        $teacher->photo_right = $photo_right;
        $teacher->save();

        User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'role' => 'teacher',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('teacher.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the teacher
        $teacher = Teacher::findOrFail($id);

        //render view with teacher
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'gender' => ['required', 'in:male,female'],
            'qualifications'=> ['nullable', 'string','max:2048'],
            'photo_left' => ['nullable', 'image','mimes:jpeg,jpg,png,svg','max:2048'],
            'photo_right' => ['nullable', 'image','mimes:jpeg,jpg,png,svg','max:2048'],
        ]);

        // get the teacher
        $teacher = Teacher::findOrFail($id);

        if ($request->hasFile('photo_left')) {
            $photo_left = Str::slug($teacher->name).'_photo_l_'.$teacher->id.'.'.$request->photo_left->getClientOriginalExtension();
            $request->photo_left->move(public_path('teachers'), $photo_left);
        } else {
            $photo_left = $teacher->photo_left;
        }

        if ($request->hasFile('photo_right')) {
            $photo_right = Str::slug($teacher->name).'_photo_r_'.$teacher->id.'.'.$request->photo_right->getClientOriginalExtension();
            $request->photo_right->move(public_path('teachers'), $photo_right);
        } else {
            $photo_right = $teacher->photo_right;
        }

        $teacher->name = $request->name;
        $teacher->phone_number = $request->phone_number;
        $teacher->gender = $request->gender;
        $teacher->qualifications = $request->qualifications;
        $teacher->photo_left = $photo_left;
        $teacher->photo_right = $photo_right;

        $teacher->save();

        $user = User::where('phone_number', $teacher->phone_number)->firstOrFail();

        $user->name = $teacher->name;
        $user->phone_number = $teacher->phone_number;
        $user->gender = $teacher->gender;
        $user->save();

        if($user->role == 'teacher'){
            return redirect()->route('teacher.edit', $teacher->id)->with('status', 'profile-updated');
        }
        return redirect()->route('teacher.index')->with('status', 'profile-updated');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // get the teacher
        $teacher = Teacher::findOrFail($id);

        //render view with teacher
        return view('teacher.delete', compact('teacher'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get the teacher
        $teacher = Teacher::findOrFail($id);

        if ($teacher->delete()) {
            if($teacher->photo_left != 'placeholder_l.svg') {
                $image_path = public_path() . '/teachers/' . $teacher->photo_left;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            if($teacher->photo_right != 'placeholder_r.svg') {
                $image_path = public_path() . '/teachers/' . $teacher->photo_right;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        $user = User::where('phone_number', $teacher->phone_number)->firstOrFail();
        $user->delete();

        return redirect()->route('teacher.index')->with('status', 'profile-deleted');
    }
}
