<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelPermits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        user_id name company no_phone address drive_id vehicle number_vehicle
        Schema::create('travel_permits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('driver_id');
            $table->string('travel_permit_number');
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('no_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('report_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('driver_id')
                ->references('id')
                ->on('drivers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
        Schema::dropIfExists('travel_permits');
    }
}
