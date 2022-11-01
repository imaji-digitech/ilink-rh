<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//name no_ktp address no_phone
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_ktp')->nullable();
            $table->string('address')->nullable();
            $table->string('no_phone')->nullable();
            $table->unsignedBigInteger('report_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('driver');
    }
}
