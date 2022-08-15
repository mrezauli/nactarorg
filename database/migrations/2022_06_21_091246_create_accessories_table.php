<?php

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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->foreignIdFor(Laboratory::class)->nullable();
            $table->integer('nos_of_printer');
            $table->integer('nos_of_projector');
            $table->integer('nos_of_usb_cable');
            $table->integer('nos_of_hdd');
            $table->integer('nos_of_vga_converter');
            $table->integer('nos_of_graphics_tab');
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
        Schema::dropIfExists('accessories');
    }
};