<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropositionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposition_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposition_id')->nullable();
            $table->string('title')->nullable();
            $table->string('print_offer')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('cover_type')->nullable();
            $table->string('hard_cover_circulation')->nullable();
            $table->string('soft_cover_circulation')->nullable();
            $table->string('book_binding')->nullable();
            $table->string('colors')->nullable();
            $table->string('colors_first_page')->nullable();
            $table->string('colors_last_page')->nullable();
            $table->string('additional_work')->nullable();
            $table->string('cover_paper_type')->nullable();
            $table->string('cover_colors')->nullable();
            $table->string('cover_plastification')->nullable();
            $table->boolean('film_print')->nullable();
            $table->boolean('blind_print')->nullable();
            $table->boolean('uv_print')->nullable();
            $table->string('number_of_pages')->nullable();

            $table->string('compensation')->nullable();
            $table->string('indirect_expenses')->nullable();
            $table->string('price_proposal')->nullable();
            $table->string('calculated_profit_percent')->nullable();
            $table->string('shop_percent')->nullable();
            $table->string('vat_percent')->nullable();

            $table->boolean('is_final')->default(false);
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
        Schema::dropIfExists('proposition_options');
    }
}
