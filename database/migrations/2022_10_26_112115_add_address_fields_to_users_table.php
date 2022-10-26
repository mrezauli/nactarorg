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
            $table->string('addressee', 30)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('name_of_police_station', 20)->nullable();
            $table->string('name_of_post_office', 20)->nullable();
            $table->integer('post_code');
            $table->integer('ward');
            $table->string('name_of_union', 20)->nullable();
            $table->string('name_of_development_circle', 20)->nullable();
            $table->string('name_of_upazilla', 20)->nullable();
            $table->string('name_of_district', 20)->nullable();
            $table->string('name_of_country', 20)->nullable();
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