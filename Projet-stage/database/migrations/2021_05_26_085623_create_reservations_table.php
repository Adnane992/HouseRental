<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id_reserv');
            $table->foreignId('id_maison')->constrained('maisons')->cascadeOnDelete();
            $table->foreignId('id_loc')->constrained('locataires')->cascadeOnDelete();
            $table->date('date_debut_reserv');
            $table->date('date_fin_reserv');
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
        Schema::dropIfExists('reservations');
    }
}
