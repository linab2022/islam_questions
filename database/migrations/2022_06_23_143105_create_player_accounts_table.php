<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateplayerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('player_email');
            $table->enum('email_type',['facebook','gmail']);
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');
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
        Schema::dropIfExists('player_accounts');
    }
}
