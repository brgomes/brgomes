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
                    'text'      => 'INÍCIO',
                    'icon'      => 'fa fa-home',
                    'route'     => 'sistema.index',
                    'active'    => ['/sistema'],
                ],
                [
                    'text'          => 'IMPORTAÇÃO',
                    'route'         => 'importacao.index',
                    'icon'          => 'fa fa-database',
                    //'label'         => ($qtdeTarefas > 0) ? $qtdeTarefas : null,
                    //'label_color'   => 'default',
                    'active'        => ['/sistema/importacao*'],
                ],
                [
                    'text'          => 'LIVROS',
                    'route'         => 'sistema.livros.index',
                    'icon'          => 'fa fa-book',
                    //'label'         => ($qtdeTarefas > 0) ? $qtdeTarefas : null,
                    //'label_color'   => 'default',
                    'active'        => ['/sistema/livros*'],
                ],
                [
                    'text'          => 'STRAVA',
                    'route'         => 'sistema.strava.index',
                    'icon'          => 'fab fa-strava',
                    //'label'         => ($qtdeTarefas > 0) ? $qtdeTarefas : null,
                    //'label_color'   => 'default',
                    'active'        => ['/sistema/strava'],
                ],
                [
                    'text'      => 'FUTINFO',
                    'icon'      => 'fas fa-futbol',
                    'submenu'   => [
                        [
                            'text'  => 'Início',
                        ],
                        [
                            'text'      => 'Cadastros',
                            'submenu'   => [
                                [
                                    'text'  => 'Clubes',
                                ],
                                [
                                    'text'  => 'Estádios',
                                ],
                                /*[
                                    'text'  => 'Árbitros',
                                ],*/
                                [
                                    'text'  => 'Campeonatos',
                                ],
                            ],
                        ],
                        [
                            'text'  => 'Resultados',
                        ],
                    ],
                ],
                [
                    'text'      => 'INVESTIMENTOS',
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
                                [
                                    'text'  => 'Categorias',
                                ],
                                [
                                    'text'  => 'Índices',
                                ],
                                [
                                    'text'  => 'Investidores',
                                ],
                                [
                                    'text'  => 'Fundamentos',
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
