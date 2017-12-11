<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->default('')->nullable();
            $table->string('last_name')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->integer('department_id')->default(0);
            $table->string('image')->default('')->nullable();
            $table->string('mobile_pre')->default('')->nullable();
            $table->string('mobile')->default('')->nullable();
            $table->string('mobile_vpn')->default('')->nullable();
            $table->string('phone_pre')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->string('phone_vpn')->default('')->nullable();
            $table->string('address')->default('')->nullable();
            $table->string('city')->default('')->nullable();
            $table->string('postal_code')->default('')->nullable();
            $table->string('room')->default('')->nullable();
            $table->string('sex')->default('')->nullable();
	        $table->string('password')->nullable();
	        $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
