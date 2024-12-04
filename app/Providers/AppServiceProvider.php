<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Models\Card;
use App\Policies\TaskPolicy;
use App\Policies\CardPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapa de políticas para os modelos da aplicação.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Task::class => TaskPolicy::class, // Associando o modelo Task à sua política
        Card::class => CardPolicy::class,
    ];

    /**
     * Registra quaisquer serviços de autenticação/autorização.
     */
    public function boot(): void
    {
        $this->registerPolicies();

         // Registre a política de criação de tarefas
         Gate::define('create-task', [\App\Policies\TaskPolicy::class, 'create']);
    }
}
