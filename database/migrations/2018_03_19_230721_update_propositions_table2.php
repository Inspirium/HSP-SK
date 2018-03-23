<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePropositionsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propositions', function (Blueprint $table) {
        	$table->string('uv_print')->nullable()->change();
	        $table->string('coverpaper_paper_type')->nullable();
	        $table->string('coverpaper_colors')->nullable();
	        $table->string('coverpaper_plastification')->nullable();
	        $table->string('coverpaper_uv_print')->nullable();
	        $table->boolean('coverpaper_film_print')->nullable();
	        $table->boolean('coverpaper_blind_print')->nullable();
	        $table->text('step_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propositions', function (Blueprint $table) {
            $table->dropColumn('coverpaper_paper_type');
            $table->dropColumn('coverpaper_colors');
            $table->dropColumn('coverpaper_plastification');
            $table->dropColumn('coverpaper_uv_print');
            $table->dropColumn('coverpaper_blind_print');
            $table->dropColumn('coverpaper_film_print');
            $table->dropColumn('step_status');
        });
    }
}
