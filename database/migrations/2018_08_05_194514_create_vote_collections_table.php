<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voterId');
            $table->integer('candidateId');
            $table->string('votedTime');
            $table->string('votedDate');
            $table->integer('totalVoter');
            $table->integer('remainingVote');
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
        Schema::dropIfExists('vote_collections');
    }
}
