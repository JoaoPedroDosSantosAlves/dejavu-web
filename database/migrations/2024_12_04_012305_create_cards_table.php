<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cards', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nome do card
        $table->string('image')->nullable(); // Imagem (opcional)
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relacionado ao usuário
        $table->timestamps(); // Campos created_at e updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
