<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelPermitDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        travel_permits_id material_type_id quantity note
        Schema::create('travel_permit_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_permit_id');
            $table->unsignedBigInteger('material_type_id');
            $table->double('quantity');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('travel_permit_id')
                ->references('id')
                ->on('travel_permits')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('material_type_id')
                ->references('id')
                ->on('material_types')
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
        Schema::dropIfExists('travel_permit_details');
    }
}
