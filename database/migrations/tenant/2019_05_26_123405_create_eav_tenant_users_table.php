<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEavTenantUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eav_tenant_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('tenant_user_id')->unsigned()->nullable();            
            $table->foreign('tenant_user_id')->references('id')->on('tenant_users')->nullable();

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
        Schema::dropIfExists('eav_tenant_users');
    }
}
