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
        Schema::create('students', function (Blueprint $table) {
            /*
                Método id()
                Determina el tipo por defecto (bigint unsigned)
                Además, aplica la restricción Primary Key
            */
            $table->id();
            $table->string('first_name', 35);
            $table->string('last_names', 45);
            $table->date('birth_date');
            $table->char('phone_number', 15)->nullable(false);
            $table->string('city', 20);
            $table->char('dni', 9)->unique()->nullable(false);
            $table->string('email', 40);
            $table->unsignedBigInteger('course_id')->nullable(false);
            // Restricción clave ajena
            $table->foreign('course_id')->references('id')->on('courses')->restrictOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('students');
    }
};
