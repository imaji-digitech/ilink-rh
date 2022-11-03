<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiptMutation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('good_receipt_mutation', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('indicator')->default(0);
            $table->timestamps();
        });
        Schema::table('good_receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('good_receipt_mutation_id')->nullable();
            $table->foreign('good_receipt_mutation_id')
                ->references('id')
                ->on('good_receipt_mutation')
                ->restrictOnDelete()
                ->cascadeOnUpdate()
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_receipt_mutation');
    }
}
