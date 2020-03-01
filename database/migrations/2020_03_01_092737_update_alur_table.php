<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAlurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alur', function (Blueprint $table) {
            $table->dropColumn('tahun');
            $table->string('tanggal')->after('judul');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alur', function (Blueprint $table) {
            $table->string('tahun')->after('judul');
            $table->dropColumn('tanggal');
        });
    }
}
