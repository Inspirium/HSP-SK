<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_order_signatures', function (Blueprint $table) {
            $table->integer('order')->nullable();
        });

        Schema::table('work_order_files', function (Blueprint $table) {
            $table->boolean('is_final')->nullable();
        });

        Schema::table('work_orders', function (Blueprint $table) {
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_order_signatures', function (Blueprint $table) {
            //
        });
    }
};
