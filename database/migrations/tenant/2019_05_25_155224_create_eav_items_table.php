<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEavItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eav_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            
            $table->bigInteger('item_id')->unsigned()->nullable();            
            $table->foreign('item_id')->references('id')->on('items')->nullable();

            $table->bigInteger('attribute_id')->unsigned()->nullable();
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('set null');
            
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
        Schema::dropIfExists('eav_items');
    }
}
