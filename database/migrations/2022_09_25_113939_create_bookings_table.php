<?php

use App\Models\Room;
use App\Models\Trainee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->date('booking_date');
            $table->dateTime('time_from')->nullable();
            $table->dateTime('time_to')->nullable();
            $table->text('additional_information')->nullable();
            $table->foreignIdFor(Trainee::class)->nullable();
            $table->foreignIdFor(Room::class)->nullable();
            $table->integer('amount');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
