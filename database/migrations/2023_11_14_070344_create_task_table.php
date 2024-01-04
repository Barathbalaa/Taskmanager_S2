<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        //
        Schema::create("task",function(Blueprint $table){
                $table->id();
                $table->string('Task_name');
                $table->string('Description');
                $table->string('Projects');
                $table->string('module_id');
                $table->string('Task_status');
                $table->string('dept');
                $table->string('user_id');
                $table->date('Assigned');
                $table->date('Submission');
                $table->string('remarks')->default('');
                $table->string('media')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
