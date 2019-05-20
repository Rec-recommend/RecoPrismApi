<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->bigIncrements('id');
               
            for ($j = 1; $j < 5;$j++) {
                $table->string('field_'.$j)->nullable();
            }
            
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('tenant_user_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->nullable();
            $table->foreign('tenant_user_id')->references('id')->on('tenant_users')->nullable();
            $table->foreign('group_id')->references('id')->on('relation_groups')->nullable();

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
        Schema::dropIfExists('relations');
    }
}
