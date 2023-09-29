<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->foreignId('room_id');
            $table->string('pj');
            $table->date('tgl_pinjam');
            $table->string('durasi');
            $table->string('status');
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
        Schema::dropIfExists('borrow_assets');
    }
}
