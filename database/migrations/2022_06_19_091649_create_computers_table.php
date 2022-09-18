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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->string('name', 100);
            $table->string('brand', 50);
            $table->string('model', 50);
            $table->string('cpu', 50);
            $table->string('ram', 50);
            $table->string('hdd', 50);
            $table->string('sale', 50);
            $table->string('sku', 50);
            $table->integer('number');
            $table->date('warranty');
            $table->foreignIdFor(Laboratory::class)->nullable();
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
        Schema::dropIfExists('computers');
    }
};
