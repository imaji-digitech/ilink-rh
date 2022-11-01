<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialMutations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_mutations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mutation_status_id');
            $table->unsignedBigInteger('report_id')->nullable();
            $table->double('amount');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('material_id')
                ->references('id')
                ->on('materials')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('mutation_status_id')
                ->references('id')
                ->on('mutation_statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('report_id')
                ->on('reports')
                ->references('id')
                ->restrictOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_mutations');
    }
}
