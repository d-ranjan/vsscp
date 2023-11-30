<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->enum('role', array('student','teacher','admin'))->default('student');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

// SQL: insert into `users` 
// (`0`, `name`, `password`, `phone_number`, `role`) values (, vsscp, $2y$12$BcODt3arF20bbEYtO00GYeh1XQzlcrUp1ZEf11WSzR3iUDGxAKnOe, 9876543210, admin), 
// (Rajiv Ranjan, $2y$12$IzpSXmyQlLcMBWsdGUkx1.IpxzVc4RVhJeqIxOLSTQR.thttD0.rC, 7909046312, teacher), (Dipu Ranjan, $2y$12$5d2VNoxMGegPYuexQUUdHuPQiDmCTXHjpgYq9ZDX3NHQ85GnS6dEu, 7970929701, student))
