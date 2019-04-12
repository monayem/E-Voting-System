<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidateId');
            $table->string('eventName');
            $table->longText('eventDescription');
            $table->string('eventDate');
            $table->string('eventBanner');
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
        Schema::dropIfExists('candidate_events');
    }
}
