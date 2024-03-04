<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            /*
                Método id()
                Determina el tipo por defecto (bigint unsigned)
                Además, aplica la restricción Primary Key
            */
            $table->id();
            $table->string('nombre', 35);
            $table->string('apellidos', 45);
            $table->date('fecha_nacimiento');
            $table->char('telefono', 15)->nullable(false);
            $table->string('poblacion', 20);
            $table->char('dni', 9)->unique()->nullable(false);
            $table->string('email', 40);
            $table->unsignedBigInteger('curso_id');
            // Restricción clave ajena
            $table->foreign('curso_id')->references('id')->on('cursos')->restrictOnDelete()->cascadeOnUpdate();
            /*
                Para los campos 'create_at' y 'update_at'
                uso de auditoría
            */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
