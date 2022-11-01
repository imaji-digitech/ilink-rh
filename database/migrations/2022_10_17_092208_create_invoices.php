<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        user_id invoice_status_id invoice_number account_number company
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('invoice_status_id');
            $table->string('invoice_number');
            $table->string('account_number');
            $table->string('company');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('report_id')->nullable();
            $table->timestamps();

            $table->foreign('report_id')
                ->on('reports')
                ->references('id')
                ->restrictOnUpdate()
                ->restrictOnDelete();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('invoice_status_id')
                ->references('id')
                ->on('invoice_statuses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
