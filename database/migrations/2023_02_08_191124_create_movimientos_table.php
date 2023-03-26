<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('cuenta', 12)->nullable()->default('5578733W020');
            $table->string('tipo', 3)->nullable()->default('CCP');
            $table->date('dateMouvement')->nullable();
            $table->text('libelle');
            $table->decimal('montant', 8, 2);
            $table->bigInteger('cliente_id')->nullable()->default(null);
            $table->bigInteger('releve')->nullable()->default(null);
            $table->date('dateReleve')->nullable();
            $table->softDeletes();
            $table->index(['cuenta', 'dateMouvement']);
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
        Schema::dropIfExists('movimientos');
    }
}
