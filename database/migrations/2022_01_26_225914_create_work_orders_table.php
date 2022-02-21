<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propositions', function(Blueprint $table) {
            $table->unsignedBigInteger('id', true)->change();
        });
        Schema::table('employees', function(Blueprint $table) {
            $table->unsignedBigInteger('id', true)->change();
        });
        Schema::table('files', function(Blueprint $table) {
            $table->unsignedBigInteger('id', true)->change();
        });
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('project_number')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('proposition_id')->nullable()->constrained();
            $table->foreignId('assignee_id')->nullable()->constrained('employees');
            $table->foreignId('assigner_id')->nullable()->constrained('employees');
            $table->json('task_content')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('deadline_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('work_order_signatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_order_id')->constrained('work_orders');
            $table->foreignId('employee_id')->constrained('employees');
            $table->boolean('signed')->nullable();
            $table->timestamp('signed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('work_order_files', function(Blueprint $table) {
            $table->id();
            $table->foreignId('work_order_id')->constrained('work_orders');
            $table->foreignId('files_id')->constrained('files');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('work_orders');
        Schema::dropIfExists('work_order_files');
        Schema::dropIfExists('work_order_signatures');
    }
}
