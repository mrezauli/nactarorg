<?php

use App\Models\Quota;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\BloodType;
use App\Models\Laboratory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('type')->nullable();
            $table->integer('contact')->nullable();
            $table->string('name_in_bangla', 50)->nullable();
            $table->string('name_of_father', 50)->nullable();
            $table->string('name_of_father_in_bangla', 50)->nullable();
            $table->string('name_of_mother', 50)->nullable();
            $table->string('name_of_mother_in_bangla', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('national_id')->unique()->nullable();
            $table->foreignIdFor(BloodType::class)->nullable();
            $table->foreignIdFor(Gender::class)->nullable();
            $table->foreignIdFor(Quota::class)->nullable();
            $table->foreignIdFor(Religion::class)->nullable();
            $table->foreignIdFor(Laboratory::class)->nullable();
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