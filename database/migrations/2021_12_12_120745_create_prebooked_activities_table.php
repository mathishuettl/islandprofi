<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrebookedActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prebooked_activities', function (Blueprint $table) {
            $table->id();
            $table->integer("location_id")->unsigned();
            $table->string("ek")->nullable();
            $table->string("vk")->nullable();
            $table->text("description")->nullable();
            $table->text("contact")->nullable();
            $table->text("information")->nullable();
            $table->text("bring")->nullable();
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
        Schema::dropIfExists('prebooked_activities');
    }
}
