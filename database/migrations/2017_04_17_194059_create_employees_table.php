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
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('email')->default('');
            $table->integer('department_id')->default('');
            $table->string('image')->default('');
            $table->string('mobile_pre')->default('');
            $table->string('mobile')->default('');
            $table->string('mobile_vpn')->default('');
            $table->string('phone_pre')->default('');
            $table->string('phone')->default('');
            $table->string('phone_vpn')->default('');
            $table->string('address')->default('');
            $table->string('city')->default('');
            $table->string('postal_code')->default('');
            $table->string('room')->default('');
            $table->string('sex')->default('');
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
