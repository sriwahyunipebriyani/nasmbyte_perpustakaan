<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksipribadi', function (Blueprint $table) {
            $table->bigIncrements('KoleksiID');

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('users');

            $table->unsignedBigInteger('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('books');

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
        Schema::dropIfExists('koleksipribadi');
    }
};
