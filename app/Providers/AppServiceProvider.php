<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Dispatcher $events)
    {
        // MENU DO SISTEMA
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = auth()->user();

            $event->menu->add('MENU');

            //$qtdeTarefas = $user->tarefas()->whereNull('realizado_at')->count();

            $event->menu->add(
                [
                    'text'      => 'Início',
                    'icon'      => 'fa fa-home',
                    'route'     => 'sistema.index',
                    'active'    => ['/sistema'],
                ],
                [
                    'text'          => 'Importação',
                    'route'         => 'importacao.index',
                    'icon'          => 'fa fa-database',
                    //'label'         => ($qtdeTarefas > 0) ? $qtdeTarefas : null,
                    //'label_color'   => 'default',
                    'active'        => ['/sistema/importacao*'],
                ],
                [
                    'text'          => 'Livros',
                    'route'         => 'sistema.livros.index',
                    'icon'          => 'fa fa-book',
                    //'label'         => ($qtdeTarefas > 0) ? $qtdeTarefas : null,
                    //'label_color'   => 'default',
                    'active'        => ['/sistema/livros*'],
                ],
                [
                    'text'          => 'Strava',
                    'route'         => 'sistema.strava.index',
                    'icon'          => 'fab fa-strava',
                    //'label'         => ($qtdeTarefas > 0) ? $qtdeTarefas : null,
                    //'label_color'   => 'default',
                    'active'        => ['/sistema/strava'],
                ],
                [
                    'text'      => 'Futebol',
                    'icon'      => 'fas fa-futbol',
                    'submenu'   => [
                        [
                            'text'      => 'Cadastros',
                            'submenu'   => [
                                [
                                    'text'  => 'Campeonatos',
                                ],
                                [
                                    'text'  => 'Clubes',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text'      => 'Investimentos',
                    'icon'      => 'fas fa-chart-line',
                    'submenu'   => [
                        [
                            'text'      => 'Cadastros',
                            'submenu'   => [
                                [
                                    'text'  => 'Listagens B3',
                                ],
                                [
                                    'text'  => 'Setores',
                                ],
                            ],
                        ],
                    ],
                ],
            );
        });
    }

    public function register()
    {
        //
    }
}
