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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->string('persona_contacto');
            $table->string('telefono_contacto', 9);
            $table->string('descripcion');
            $table->string('email')->unique();
            $table->string('direccion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('codigo_postal', 5)->nullable();
            $table->string('provincia')->nullable();
            $table->char('estado', 1);
            $table->date('fecha_creacion');
            $table->string('operario')->nullable();
            $table->date('fecha_realizacion')->nullable();
            $table->text('anotaciones_antes')->nullable();
            $table->text('anotaciones_despues')->nullable();
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
        Schema::dropIfExists('tareas');
    }
};
