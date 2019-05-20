<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('tenant_user_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->nullable();
            $table->foreign('tenant_user_id')->references('id')->on('tenant_users')->nullable();

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
        Schema::dropIfExists('request_logs');
    }
}
