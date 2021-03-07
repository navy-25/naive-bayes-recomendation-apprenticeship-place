<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_data', function (Blueprint $table) {
            $table->id();
            $table->string('id_lokasi')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('id_kota')->nullable();
            $table->string('id_program_studi')->nullable();
            $table->string('id_peminatan')->nullable();
            $table->string('Nilai_SIE')->nullable();
            $table->string('Nilai_MLP')->nullable();
            $table->string('Nilai_MLTI')->nullable();
            $table->string('Nilai_PITI')->nullable();

            $table->string('Nilai_KK')->nullable();
            $table->string('Nilai_NKB')->nullable();
            $table->string('Nilai_VVPL')->nullable();
            $table->string('Nilai_KA')->nullable();
            $table->string('Nilai_PAG')->nullable();
            $table->string('Nilai_JKKG')->nullable();

            $table->string('Nilai_KJK')->nullable();
            $table->string('Nilai_MJ')->nullable();
            $table->string('Nilai_PCD')->nullable();
            $table->string('Nilai_TA')->nullable();
            $table->string('Nilai_MP')->nullable();
            $table->string('Nilai_PBD')->nullable();

            $table->string('Nilai_PPF')->nullable();
            $table->string('Nilai_JKL')->nullable();
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
        Schema::dropIfExists('train_data');
    }
}
