<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_pedida');
            $table->bigInteger('precio_total');

            $table->foreignId('facturas_id')
            ->constrained('facturas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('productos_id')
            ->constrained('productos')
            ->onUpdate('cascade')
            ->onDelete('cascade');




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
        Schema::dropIfExists('detalle_facturas');
    }
}
