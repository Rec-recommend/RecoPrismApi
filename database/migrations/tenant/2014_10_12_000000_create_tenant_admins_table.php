<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_admins', function (Blueprint $table) {
            $this->bigIncrements('id');
            $this->string('name');
            $this->string('email')->unique();
            $this->timestamp('email_verified_at')->nullable();
            $this->string('password');
            $this->rememberToken();
            $this->timestamps();
            $table->boolean('is_owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant_admins');
    }
}
