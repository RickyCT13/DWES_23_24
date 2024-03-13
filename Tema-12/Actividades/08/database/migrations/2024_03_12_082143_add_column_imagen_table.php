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
        //
        Schema::table('articulos', function (Blueprint $table) {
            /*
                'binary()' crea el equivalente a una columna de tipo BLOB.

                Se usa el modificador 'after()' para que se posicione antes
                de las timestamps (create_at y update_at).
            */
            $table->binary('imagen')->after('precio_venta')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('articulos', function (Blueprint $table) {
            /*
                Elimina la columna
            */
            $table->dropColumn('imagen');
        });
    }
};
