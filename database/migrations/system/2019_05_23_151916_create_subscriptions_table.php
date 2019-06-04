<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('api_key');
            $table->boolean('is_active');
            $table->bigInteger('hostname_id')->unsigned()->nullable();
            $table->foreign('hostname_id')->references('id')->on('hostnames')->onDelete('set null');
            $table->bigInteger('payment_plan_id')->unsigned()->nullable();
            $table->foreign('payment_plan_id')->references('id')->on('payment_plans')->onDelete('set null');
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
        Schema::dropIfExists('subscriptions');
    }
}
