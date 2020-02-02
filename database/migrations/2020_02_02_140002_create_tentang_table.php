<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul1');
            $table->string('icon1');
            $table->string('deskripsi1');
            $table->string('judul2');
            $table->string('icon2');
            $table->string('deskripsi2');
            $table->string('judul3');
            $table->string('icon3');
            $table->string('deskripsi3');
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
        Schema::dropIfExists('tentang');
    }
}
