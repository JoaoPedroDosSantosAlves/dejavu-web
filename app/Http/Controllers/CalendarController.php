<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Task;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->query('month', now()->month);
        $year = $request->query('year', now()->year);

        // Obtém todas as tarefas do mês do usuário autenticado
        $tasks = Task::where('user_id', Auth::id())
                     ->whereYear('due_date', $year)
                     ->whereMonth('due_date', $month)
                     ->get();

        return view('calendar', compact('month', 'year', 'tasks'));
    }

    public function getTasksForDate($date)
    {
        // Obtém as tarefas de uma data específica para o usuário autenticado
        $tasks = Task::where('user_id', Auth::id())
                     ->whereDate('due_date', $date)
                     ->get();

        return response()->json($tasks);
    }
}

