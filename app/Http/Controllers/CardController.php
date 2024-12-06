<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CardController extends Controller
{
    use AuthorizesRequests;

    /**
     * Lista todos os cards do usuário autenticado.
     */
    public function index()
    {
        $cards = Card::where('user_id', Auth::id())->get(); // Filtra os cards pelo usuário logado
        return view('home', compact('cards'));
    }

    /**
     * Cria um novo card.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Imagem opcional
        ]);

        // Criação do card
        $card = new Card($validated);
        $card->user_id = Auth::id(); // Definir o usuário logado

        // Se houver imagem, fazer upload
        if ($request->hasFile('image')) {
            // Armazenando a imagem no diretório público
            $path = $request->file('image')->store('images', 'public'); // 'public' é o disco para a pasta public
            $card->image = $path; // Salva o caminho no banco de dados
        }

        // Salva o card no banco de dados
        $card->save();

        // Retorna o card recém-criado com um status de sucesso
        return redirect()->route('home');
    }

    /**
     * Exibe um card específico.
     */
    public function show(Card $card)
    {
        $this->authorize('view', $card); // Verifica se o usuário tem permissão
        return response()->json($card->load('tasks')); // Retorna o card com as tarefas associadas
    }

    /**
     * Atualiza um card.
     */
    public function update(Request $request, Card $card)
    {
        $this->authorize('update', $card); // Verifica se o usuário tem permissão para editar o card

        // Validação dos dados de entrada
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Imagem opcional
        ]);

        // Se houver nova imagem, fazer upload
        if ($request->hasFile('image')) {
            // Apaga a imagem anterior (se houver)
            if ($card->image && Storage::exists($card->image)) {
                Storage::delete($card->image);
            }
            
            // Armazena a nova imagem
            $path = $request->file('image')->store('cards');
            $validated['image'] = $path;
        }

        // Atualiza os dados do card
        $card->update($validated);

        // Retorna o card atualizado
         return redirect()->route('home');
    }

    /**
     * Remove um card.
     */
    public function destroy(Card $card)
    {
        $this->authorize('delete', $card); // Verifica se o usuário tem permissão para excluir o card

        // Apaga a imagem associada ao card (se houver)
        if ($card->image && Storage::exists($card->image)) {
            Storage::delete($card->image);
        }

        // Deleta o card
        $card->delete();

        // Retorna uma resposta de sucesso
        return redirect()->route('home')->with('success', 'Card excluído com sucesso!');
    }
}
