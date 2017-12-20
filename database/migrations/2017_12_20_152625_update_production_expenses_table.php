<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductionExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('production_expenses', function (Blueprint $table) {
	        $table->string('layout_exact_price')->nullable();
	        $table->string('design_exact_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production_expenses', function (Blueprint $table) {
            $table->dropColumn(['layout_exact_price', 'design_exact_price']);
        });
    }
}
