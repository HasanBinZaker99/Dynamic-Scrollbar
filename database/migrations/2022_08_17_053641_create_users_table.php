<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('employeeId')->comment("department wise")->nullable();
            $table->string('dateOfJoining')->nullable();
            $table->integer('departmentId')->nullable();
            $table->integer('designationId')->nullable();
            $table->integer('roleId')->nullable();
            $table->string('gender')->nullable();
            $table->string('dateOfBarth')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('headOfDepartmentId')->nullable();
            $table->integer('BasicSalary')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
