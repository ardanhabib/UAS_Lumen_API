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
        Schema::create('bahan', function (Blueprint $table) {
            $table->bigIncrements('kode_bahan');
            $table->string('nama_bahan');
            $table->text('minimum');
            $table->text('stok');
            $table->text('satuan');
            $table->text('kode_supplier');
            $table->text('berat');
            $table->text('satuan_berat');
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
        Schema::dropIfExists('bahan');
    }
};
