<?php

use App\Models\BloodType;
use App\Models\Gender;
use App\Models\Quota;
use App\Models\Religion;
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
            $table->foreignIdFor(BloodType::class)->nullable();
            $table->foreignIdFor(Gender::class)->nullable();
            $table->foreignIdFor(Quota::class)->nullable();
            $table->foreignIdFor(Religion::class)->nullable();
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
