<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.index', [
            'courses' => Course::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
            'description' => ['required', 'string', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,jpg,png,svg', 'max:2048'],
        ]);

        $course = Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'qualifications' => $request->qualifications,
        ]);

        if ($request->hasFile('banner')) {
            $banner = Str::slug($course->name) . $course->id . '.' . $request->banner->getClientOriginalExtension();
            $request->banner->move(public_path('courses'), $banner);
        } else {
            $banner = 'course_placeholder.svg';
        }

        $course->banner = $banner;
        $course->save();

        return redirect()->route('course.index')->with('status', 'course-added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the course
        $course = Course::findOrFail($id);

        //render view with course
        return view('course.edit', compact('course'));
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
            'description' => ['required', 'string', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,jpg,png,svg', 'max:2048'],
        ]);

        $course = Course::findOrFail($id);

        if ($request->hasFile('banner')) {
            $banner = Str::slug($course->name) . $course->id . '.' . $request->banner->getClientOriginalExtension();
            $request->banner->move(public_path('courses'), $banner);
        } else {
            $banner = 'course_placeholder.svg';
        }

        $course->name = $request->name;
        $course->slug = Str::slug($request->name);
        $course->description = $request->description;
        $course->banner = $banner;

        $course->save();

        return redirect()->route('course.index')->with('status', 'course-updated');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $course = Course::findOrFail($id);

        return view('course.delete', compact('course'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->delete()) {
            if ($course->banner != 'course_placeholder.svg') {
                $image_path = public_path() . '/courses/' . $course->banner;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return redirect()->route('course.index')->with('status', 'course-deleted');
    }
}
