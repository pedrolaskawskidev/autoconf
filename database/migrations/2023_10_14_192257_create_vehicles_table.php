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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('fuel',['gasoline','alcohol','diesel','total_flex', 'eletric', 'hybrid']);
            $table->string('color');
            $table->float('price', 8, 2);
            $table->enum('doors', ['2', '4']);
            $table->string('manufacturing_year');
            $table->string('model_year');
            $table->string('plate');
            $table->string('motor');
            $table->string('mileage');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('vehicle_model_id');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models');
            $table->string("image");
            $table->boolean('deleted')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
