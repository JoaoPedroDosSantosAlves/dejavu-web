<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    // app/Http/Controllers/TaskController.php

public function showTasks($cardId)
{
    // Recupera as tarefas associadas ao card
    $tasks = Task::where('card_id', $cardId)->get();
    
    // Retorna as tarefas em formato JSON
    return response()->json($tasks);
}

public function store(Request $request, $cardId)
{
    // Encontra o card associado ao ID
    $card = Card::findOrFail($cardId);

    // Verifica se o usuário tem permissão para criar a tarefa
    $this->authorize('create-task', $card);

    // Validação dos dados
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'due_date' => 'required|date',
        'due_time' => 'required|date_format:H:i',
    ]);

    // Criação da tarefa associada ao card
    $task = new Task();
    $task->name = $request->name;
    $task->due_date = $request->due_date;
    $task->due_time = $request->due_time;
    $task->card_id = $card->id;
    $task->user_id = auth()->user()->id;
    $task->save();

    // Retorna a tarefa criada em formato JSON para exibição no modal
    return redirect()->route('home')->with('success', 'Tarefa criada com sucesso!');
}
    /**
     * Exibe uma tarefa específica.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task); // Verifica se o usuário tem permissão
        return response()->json($task); // Retorna a tarefa
    }

    /**
     * Atualiza uma tarefa.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task); // Verifica se o usuário tem permissão para editar a tarefa

        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'due_date' => 'required|date',
            'due_time' => 'required|date_format:H:i',
            'status' => 'required|in:não concluído,concluído', // Valida o status
        ]);

        // Atualiza a tarefa
        $task->update($validated);

        // Retorna a tarefa atualizada
        return response()->json($task);
    }

    /**
     * Remove uma tarefa.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // Verifica se o usuário tem permissão para excluir a tarefa
        $task->delete(); // Deleta a tarefa
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
