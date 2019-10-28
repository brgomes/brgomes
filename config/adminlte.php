<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'brgomes.com',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>brgomes</b>.com',

    'logo_mini' => '<b>B</b>R',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '/',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => '',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        /*'MENU',
        [
            'text'      => 'INÍCIO',
            'route'     => 'home',
            'icon'      => 'home',
            'active'    => ['/'],
        ],
        [
            'text'          => 'Tarefas',
            'route'         => 'sistema.tarefas.mensal',
            'icon'          => 'tasks',
            'label'         => '4',
            'label_color'   => 'danger',
            'active'        => ['/sistema/tarefas/*'],
        ],
        [
            'text'      => 'BILHAR',
            'icon'      => 'cubes',
            'can'       => 'modulo-5',
            'submenu'   => [
                [
                    'text'      => 'Pessoas',
                    'route'     => 'bilhar.pessoas.index',
                    'can'       => 'bilhar.pessoas.index',
                    'active'    => ['bilhar/pessoas*'],
                ],
                [
                    'text'      => 'Mesas',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Cadastro',
                            'route'     => 'bilhar.mesas.index',
                            'can'       => 'bilhar.mesas.index',
                            'active'    => ['bilhar/mesas', 'bilhar/mesas?*', 'bilhar/mesas/*'],
                        ],
                        [
                            'text'      => 'Locar mesas',
                            'route'     => 'bilhar.mesas.lista-liberadas',
                            'can'       => 'bilhar.mesas.locar',
                            'active'    => ['bilhar/locar-mesa*'],
                        ],
                        [
                            'text'      => 'Liberar mesas',
                            'route'     => 'bilhar.mesas.lista-locadas',
                            'can'       => 'bilhar.mesas.liberar',
                            'active'    => ['bilhar/liberar-mesa*'],
                        ],
                        [
                            'text'      => 'Atualizar relógios',
                            'route'     => 'bilhar.relogios.index',
                            'can'       => 'bilhar.mesas.inserir-relogio',
                            'active'    => ['bilhar/relogios*'],
                        ],
                    ]
                ],
                [
                    'text'      => 'Relatórios',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Mapa de cobrança',
                            'route'     => 'bilhar.relatorios.mapa-cobranca',
                            'can'       => 'bilhar.relatorios.mapa-cobranca',
                            'active'    => ['bilhar/relatorios/mapa-cobranca*'],
                        ],
                        [
                            'text'      => 'Mesas',
                            //'route'     => 'bilhar.relatorios.mesas',
                            //'can'       => 'bilhar.relatorios.mesas',
                            //'active'    => ['bilhar/relatorios/mesas*'],
                        ],
                        [
                            'text'      => 'Contratos',
                            //'route'     => 'bilhar.relatorios.contratos',
                            //'can'       => 'bilhar.relatorios.contratos',
                            //'active'    => ['bilhar/relatorios/contratos*'],
                        ],
                    ]
                ],
                [
                    'text'      => 'Configurações',
                    'route'     => 'bilhar.configuracoes.index',
                    'can'       => 'bilhar.configuracoes',
                    'active'    => ['bilhar/configuracoes*'],
                ],
            ],
        ],
        [
            'text'      => 'CONFIGURAÇÕES',
            'icon'      => 'cog',
            'submenu'   => [
                [
                    'text'      => 'Meu cadastro',
                    'route'     => 'configuracoes.meucadastro',
                    'active'    => ['configuracoes/meucadastro'],
                ],
                [
                    'text'      => 'Mudar senha',
                    'route'     => 'configuracoes.senha',
                    'active'    => ['configuracoes/senha'],
                ],
                [
                    'text'      => 'Assinatura',
                    'route'     => 'configuracoes.assinatura',
                    'active'    => ['configuracoes/assinatura'],
                ],
            ],
        ],
        [
            'text'      => 'FINANCEIRO',
            'icon'      => 'bank',
            'can'       => 'modulo-4',
            'submenu'   => [
                [
                    'text'      => 'Contas a pagar',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Tipos de conta',
                            'route'     => 'financeiro.tipos-conta-pagar.index',
                            'can'       => 'financeiro.tipos-conta-pagar.index',
                            'active'    => ['financeiro/tipos-conta-pagar*'],
                        ],
                        [
                            'text'      => 'Conta a pagar',
                            'route'     => 'financeiro.contas-pagar.index',
                            'can'       => 'financeiro.contas-pagar.index',
                            'active'    => ['financeiro/contas-pagar*'],
                        ],
                    ]
                ],
                [
                    'text'      => 'Contas a receber',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Tipo de conta',
                            'route'     => 'financeiro.tipos-conta-receber.index',
                            'can'       => 'financeiro.tipos-conta-receber.index',
                            'active'    => ['financeiro/tipos-conta-receber*'],
                        ],
                        [
                            'text'      => 'Contas a receber',
                            'route'     => 'financeiro.contas-receber.index',
                            'can'       => 'financeiro.contas-receber.index',
                            'active'    => ['financeiro/contas-receber*'],
                        ],
                    ]
                ],
                [
                    'text'      => 'Relatórios',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Contas a pagar',
                            //'route'     => 'financeiro.relatorios.contas-pagar',
                            //'can'       => 'financeiro.relatorios.contas-pagar',
                            //'active'    => ['financeiro/tipos-conta-receber*'],
                        ],
                        [
                            'text'      => 'Contas a receber',
                            //'route'     => 'financeiro.relatorios.contas-receber',
                            //'can'       => 'financeiro.relatorios.contas-receber',
                            //'active'    => ['financeiro/contas-receber*'],
                        ],
                    ]
                ],
            ],
        ],
        [
            'text'      => 'JURÍDICO',
            'icon'      => 'gavel',
            'can'       => 'modulo-2',
            'submenu'   => [
                [
                    'text'      => 'Básico',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Áreas jurídicas',
                            'route'     => 'juridico.areas-juridicas.index',
                            'can'       => 'juridico.areasjuridicas.index',
                            'active'    => ['juridico/areas-juridicas*'],
                        ],
                        [
                            'text'      => 'Funções',
                            'route'     => 'juridico.funcoes.index',
                            'can'       => 'juridico.funcoes.index',
                            'active'    => ['juridico/funcoes*'],
                        ],
                        [
                            'text'      => 'Locais de tramitação',
                            'route'     => 'juridico.locais-tramitacao.index',
                            'can'       => 'juridico.locaistramitacao.index',
                            'active'    => ['juridico/locais-tramitacao*'],
                        ],
                        [
                            'text'      => 'Naturezas de processo',
                            'route'     => 'juridico.naturezas.index',
                            'can'       => 'juridico.naturezas.index',
                            'active'    => ['juridico/naturezas*'],
                        ],
                        [
                            'text'      => 'Pastas',
                            'route'     => 'juridico.pastas.index',
                            'can'       => 'juridico.pastas.index',
                            'active'    => ['juridico/pastas*'],
                        ],
                        [
                            'text'      => 'Situações de recurso',
                            'route'     => 'juridico.situacoes-recurso.index',
                            'can'       => 'juridico.situacoesrecurso.index',
                            'active'    => ['juridico/situacoes-recurso*'],
                        ],
                        [
                            'text'      => 'Tipos de ação',
                            'route'     => 'juridico.tipos-acao.index',
                            'can'       => 'juridico.tiposacao.index',
                            'active'    => ['juridico/tipos-acao*'],
                        ],
                        [
                            'text'      => 'Tipos de andamento',
                            'route'     => 'juridico.tipos-andamento.index',
                            'can'       => 'juridico.tiposandamento.index',
                            'active'    => ['juridico/tipos-andamento*'],
                        ],
                        [
                            'text'      => 'Tipos de procedimento',
                            'route'     => 'juridico.tipos-procedimento.index',
                            'can'       => 'juridico.tiposprocedimento.index',
                            'active'    => ['juridico/tipos-procedimento*'],
                        ],
                        [
                            'text'      => 'Tipos de recurso',
                            'route'     => 'juridico.tipos-recurso.index',
                            'can'       => 'juridico.tiposrecurso.index',
                            'active'    => ['juridico/tipos-recurso*'],
                        ],
                    ],
                ],
                [
                    'text'      => 'Pessoas',
                    'route'     => 'juridico.pessoas.index',
                    'can'       => 'juridico.pessoas.index',
                    'active'    => ['juridico/pessoas*'],
                ],
                [
                    'text'      => 'Processos',
                    'route'     => 'juridico.processos.index',
                    'can'       => 'juridico.processos.index',
                    'active'    => ['juridico/processos*'],
                ],
                [
                    'text'      => 'Atendimentos',
                    'route'     => 'juridico.atendimentos.index',
                    'can'       => 'juridico.atendimentos.index',
                    'active'    => ['juridico/atendimentos*'],
                ],
                [
                    'text'      => 'Relatórios',
                    'icon'      => 'fas fa-fw fa-share',
                    'submenu'   => [
                        [
                            'text'      => 'Clientes',
                            'route'     => 'juridico.relatorios.clientes',
                            'can'       => 'juridico.relatorios.clientes',
                            'active'    => ['juridico/relatorios/clientes*'],
                        ],
                        [
                            'text'      => 'Processos',
                            'route'     => 'juridico.relatorios.processos',
                            'can'       => 'juridico.relatorios.processos',
                            'active'    => ['juridico/relatorios/processos*'],
                        ],
                    ]
                ],
            ],
        ],
        [
            'text'      => 'SISTEMA',
            'icon'      => 'database',
            'can'       => 'modulo-1',
            'submenu'   => [
                [
                    'text'      => 'Profissões',
                    'route'     => 'sistema.profissoes.index',
                    'can'       => 'sistema.profissoes.index',
                    'active'    => ['sistema/profissoes*'],
                ],
                [
                    'text'      => 'Usuários',
                    'route'     => 'sistema.usuarios.index',
                    'can'       => 'sistema.usuarios.index',
                    'active'    => ['sistema/usuarios*'],
                ],
                [
                    'text'      => 'Perfis',
                    'route'     => 'sistema.papeis.index',
                    'can'       => 'sistema.perfis.index',
                    'active'    => ['sistema/papeis*'],
                ],
                [
                    'text'      => 'Unidades de trabalho',
                    'route'     => 'sistema.unidades.index',
                    'can'       => 'sistema.unidades.index',
                    'active'    => ['sistema/unidades*'],
                ],
                [
                    'text'      => 'Tarefas',
                    'route'     => 'sistema.tarefas.index',
                    'can'       => 'sistema.tarefas.index',
                    'active'    => ['sistema/tarefas/*'],
                ],
            ],
        ],
        [
            'text'      => 'SOBGESTÃO',
            'icon'      => 'leaf',
            'can'       => 'superadmin',
            'submenu'   => [
                [
                    'text'      => 'Coligadas',
                    'route'     => 'sobgestao.coligadas.index',
                    'active'    => ['sobgestao/coligadas*'],
                ],
                [
                    'text'      => 'Assinaturas',
                    'route'     => 'sobgestao.assinaturas.index',
                    //'active'    => [''],
                ],
                [
                    'text'      => 'Módulos',
                    'route'     => 'sobgestao.modulos.index',
                    'active'    => ['sobgestao/modulos*', 'sobgestao/cadastros*', 'sobgestao/permissoes*']
                ],
                [
                    'text'      => 'Países, estados e cidades',
                    'route'     => 'sobgestao.paises.index',
                    'active'    => ['sobgestao/paises*', 'sobgestao/estados*', 'sobgestao/cidades*']
                ],
            ],
        ],*/
        

        /*'LABELS',
        [
            'text'       => 'Important',
            'icon_color' => 'red',
        ],
        [
            'text'       => 'Warning',
            'icon_color' => 'yellow',
        ],
        [
            'text'       => 'Information',
            'icon_color' => 'aqua',
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        //'datatables' => true,
        //'select2'    => true,
        //'chartjs'    => true,
    ],
];
