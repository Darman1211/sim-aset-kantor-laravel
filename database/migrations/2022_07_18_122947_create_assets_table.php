<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('room_id');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('merek');
            $table->integer('jumlah');
            $table->integer('tahun');
            $table->string('garansi');
            $table->string('harga');
            $table->boolean('make_qr')->default(false);
            $table->string('gambar_qr')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
