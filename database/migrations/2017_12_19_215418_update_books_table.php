<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
	        $table->integer('proposition_id')->nullable();
	        $table->text('school_level')->nullable();
	        $table->boolean('school_assignment')->nullable();
	        $table->string('retail_price')->nullable();
	        $table->string('number_of_pages')->nullable();
	        $table->string('width')->nullable();
	        $table->string('height')->nullable();
	        $table->string('paper_type')->nullable();
	        $table->string('colors')->nullable();
	        $table->string('colors_first_page')->nullable();
	        $table->string('colors_last_page')->nullable();
	        $table->string('cover_type')->nullable();
	        $table->string('cover_paper_type')->nullable();
	        $table->string('cover_colors')->nullable();
	        $table->string('cover_plastification')->nullable();
	        $table->boolean('film_print')->nullable();
	        $table->boolean('blind_print')->nullable();
	        $table->boolean('uv_print')->nullable();
	        $table->string('book_binding')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['proposition_id', 'school_level', 'school_assignment', 'retail_price', 'number_of_pages', 'width', 'height', 'paper_type', 'colors', 'colors_first_page', 'colors_last_page', 'cover_type', 'cover_paper_type', 'cover_colors', 'cover_plastification', 'film_print', 'blind_print', 'uv_print', 'book_binding']);
        });
    }
}
