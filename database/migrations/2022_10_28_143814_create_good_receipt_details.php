<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiptDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_receipt_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('good_receipt_id');
            $table->double('quantity');
            $table->string('quantity_type');
            $table->timestamps();

            $table->foreign('material_id')
                ->references('id')
                ->on('materials')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('good_receipt_id')
                ->references('id')
                ->on('good_receipts')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_receipt_details');
    }
}
