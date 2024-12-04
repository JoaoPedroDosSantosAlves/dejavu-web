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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('name',255); // Nome da tarefa
        $table->date('due_date'); // Data para concluir
        $table->time('due_time'); // Hora para concluir
        $table->enum('status', ['não concluído', 'concluído'])->default('não concluído'); // Status de andamento
        $table->foreignId('card_id')->constrained('cards')->onDelete('cascade'); // Relacionado ao card
        $table->timestamps(); // Campos created_at e updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
