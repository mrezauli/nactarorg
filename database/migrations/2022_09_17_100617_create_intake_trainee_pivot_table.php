<?php

use App\Models\Intake;
use App\Models\Trainee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntakeTraineePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intake_trainee', function (Blueprint $table) {
            $table->foreignIdFor(Intake::class);
            $table->foreignIdFor(Trainee::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intake_user');
    }
}
