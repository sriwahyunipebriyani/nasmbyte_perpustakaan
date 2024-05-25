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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('PeminjamanID');

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('users');

            $table->unsignedBigInteger('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('books');

            $table->date('TanggalPeminjaman');
            $table->date('TanggalPengembalian');
            $table->enum('Status', ['available', 'not available']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
