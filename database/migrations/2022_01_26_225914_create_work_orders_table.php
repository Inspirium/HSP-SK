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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('edition')->nullable();
            $table->string('project_number')->nullable();
            $table->string('project_subnumber')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('proposition_id')->constrained('propositions')->nullable();
            $table->foreignId('assignee_id')->constrained('employees')->nullable();
            $table->foreignId('assigner_id')->constrained('employees')->nullable();
            $table->json('task_content')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('deadline')->nullable();
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
        Schema::dropIfExists('work_orders');
    }
}
