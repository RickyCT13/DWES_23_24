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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 255);
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            $table->unsignedBigInteger('stock');
            $table->unsignedDecimal('precio_coste', 10, 2);
            $table->unsignedDecimal('precio_venta', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
