<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('end_user_id')->nullable();
            $table->foreign('end_user_id')->references('id')->on('end_users')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->nullable();
            $table->unsignedBigInteger('value');
            $table->unique(['end_user_id', 'item_id']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
