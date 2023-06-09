<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraspasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('traspasos', function (Blueprint $table) {
            $table->id();
            $table->date('dateImportation')->nullable();
            $table->text('libelle');
            $table->decimal('montant', 8, 2)->nullable()->default(0);
            $table->string('archivo', 100)->nullable()->default(null);
            $table->text('dupTxt')->charset('utf8');
            $table->unsignedBigInteger('archivado')->nullable()->default(0);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traspasos');
    }
}
