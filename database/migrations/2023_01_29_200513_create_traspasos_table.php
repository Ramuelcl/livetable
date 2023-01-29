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
            $table->string('cuenta', 12)->nullable()->default('5578733W020');
            $table->string('tipo', 3)->nullable()->default('CCP');
            $table->timestamp('date')->nullable();
            $table->text('libelle');
            $table->decimal('montant', 8, 2);
            $table->string('archivo', 20);
            $table->softDeletes();
            $table->timestamps();
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
