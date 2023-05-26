<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_teacher');
            $table->dropColumn('is_student');
            $table->unsignedBigInteger('teacher_id')->nullable()->default(null);
            $table->unsignedBigInteger('student_id')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_teacher')->default(0);
            $table->boolean('is_student')->default(1);
            $table->dropColumn('teacher_id');
            $table->dropColumn('student_id');
        });
    }
}
