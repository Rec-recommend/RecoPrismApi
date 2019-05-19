<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->string('category_A');
            $table->string('category_B');
            $table->string('category_C');
            $table->string('category_D');
            $table->string('category_E');
            $table->text('tags');
            $table->text('description');
            $table->string('field_1');
            $table->string('field_2');
            $table->string('field_3');
            $table->string('field_4');
            $table->string('field_5');
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
        Schema::dropIfExists('items');
    }
}
