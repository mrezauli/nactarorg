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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_in_bangla', 50)->nullable();
            $table->string('name_of_father', 50)->nullable();
            $table->string('name_of_father_in_bangla', 50)->nullable();
            $table->string('name_of_mother', 50)->nullable();
            $table->string('name_of_mother_in_bangla', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('national_id')->unique()->nullable();
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
            //
        });
    }
};
