<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('color_id');

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('color_id')->references('id')->on('colors');

            $table->double('price');
            $table->boolean('is_default')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_items');
    }
}
