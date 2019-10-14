<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ env('APP_NAME') }} [ criação de sites e sistemas PHP ]</title>
    <meta charset="UTF-8">
    <meta name="description" content="Labs - Design Studio">
    <meta name="keywords" content="lab, onepage, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "/>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader">
            <img src="img/logo.png" alt="">
            <h2>Loading.....</h2>
        </div>
    </div>


    <!-- Header section -->
    <header class="header-section">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <!--<div class="responsive"><i class="fa fa-bars"></i></div>
        <nav>
            <ul class="menu-list">
                <li class="active"><a href="{{ url('/') }}">Início</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="elements.html">Elements</a></li>
            </ul>
        </nav>-->
    </header>
    <!-- Header section end -->


    <!-- Intro Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-center">
                <img src="{{ asset('img/big-logo.png') }}" alt="">
                <p></p>
            </div>
        </div>
        <!-- slider -->
        <div id="hero-slider" class="owl-carousel">
            <div class="item hero-item" data-bg="{{ asset('img/01.jpg') }}"></div>
            <div class="item hero-item" data-bg="{{ asset('img/02.jpg') }}"></div>
        </div>
    </div>
    <!-- Intro Section -->


    <!-- About section -->
    <div class="about-section">
        <div class="overlay"></div>
        <!-- card section -->
        <div class="card-section">
            <div class="container">
                <div class="row">
                    <!-- single card -->
                    <div class="col-md-4 col-sm-6">
                        <div class="lab-card">
                            <div class="icon">
                                <i class="flaticon-023-flask"></i>
                            </div>
                            <h2>Formação</h2>
                            <p>
                                Bacharel em Ciência da Computação
                                <br />
                                (IUESO - Instituto Unificado de Ensino Superior Objetivo, Goiânia-GO/2003).
                            </p>
                        </div>
                    </div>
                    <!-- single card -->
                    <div class="col-md-4 col-sm-6">
                        <div class="lab-card">
                            <div class="icon">
                                <i class="flaticon-011-compass"></i>
                            </div>
                            <h2>Experiência</h2>
                            <p>
                                Programador com 16 anos de mercado, atua há 12 anos como Analista
                                de Sistemas na <a href="http://www.unirg.edu.br" target="_blank">Universidade de Gurupi</a> (Tocantins).
                            </p>
                        </div>
                    </div>
                    <!-- single card -->
                    <div class="col-md-4 col-sm-12">
                        <div class="lab-card">
                            <div class="icon">
                                <i class="flaticon-037-idea"></i>
                            </div>
                            <h2>Serviços</h2>
                            <p>
                                Modelagem, desenvolvimento e hospedagem de websites e sistemas online.
                                <br />
                                Consultoria em projetos na internet.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card section end-->
    </div>
    <!-- About section end -->


    <!-- Testimonial section -->
    <div class="testimonial-section mb60">
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h2>Portfólio <span>em</span> destaque</h2>
            </div>
            <div class="row">
                <!-- single member -->
                <div class="col-sm-4">
                    <div class="member">
                        <a href="http://www.futeboldegoyaz.com.br" target="_blank"><img src="{{ asset('img/team/1.jpg') }}" alt=""></a>
                        <h2>Futebol de Goyaz</h2>
                        <h3>Goiânia (GO)</h3>
                    </div>
                </div>
                <!-- single member -->
                <div class="col-sm-4">
                    <div class="member">
                        <a href="http://www.titempus.com.br" target="_blank"><img src="{{ asset('img/team/2.jpg') }}" alt=""></a>
                        <h2>TITempus</h2>
                        <h3>Natal (RN)</h3>
                    </div>
                </div>
                <!-- single member -->
                <div class="col-sm-4">
                    <div class="member">
                        <a href="http://www.boasorteimoveis.com.br" target="_blank"><img src="{{ asset('img/team/3.jpg') }}" alt=""></a>
                        <h2>Boa Sorte Imóveis</h2>
                        <h3>Gurupi (TO)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial section end-->


    <a name="contato"></a>
    <!-- Contact section -->
    <div class="contact-section spad fix">
        <div class="container">
            <div class="row">
                <!-- contact info -->
                <div class="col-md-5 col-md-offset-1 contact-info col-push">
                    <div class="section-title left">
                        <h2>Entre em contato</h2>
                    </div>
                    <p>A resposta será enviada o mais breve possível.</p>
                    <h3 class="mt60">Redes sociais</h3>
                    <p class="con-item"><a href="https://twitter.com/brgomes" target="_blank">Twitter</a></p>
                    <p class="con-item"><a href="https://www.skoob.com.br/usuario/127841-bruno-roberto" target="_blank">Skoob</a></p>
                    <p class="con-item"><a href="https://www.last.fm/pt/user/brgomes" target="_blank">Last.fm</a></p>
                </div>
                <!-- contact form -->
                <div class="col-md-6 col-pull">
                    @include('includes._alerts')

                    {!! Form::open(['route' => 'enviar', 'class' => 'form-class', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::text('nome', null, ['placeholder' => 'Seu nome']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::email('email', null, ['placeholder' => 'Seu e-mail']) !!}
                            </div>
                            <div class="col-sm-12">
                                {!! Form::text('assunto', null, ['placeholder' => 'Assunto']) !!}
                                {!! Form::textarea('mensagem', null, ['placeholder' => 'Mensagem']) !!}

                                <button type="submit" class="site-btn">Enviar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Contact section end-->


    <!-- Footer section -->
    <footer class="footer-section">
        <h2>&copy; 2005-{{ date('Y') }} Todos os direitos reservados.</h2>
    </footer>
    <!-- Footer section end -->




    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @include('includes._recaptcha', ['action' => 'brgomes:contato'])
</body>
</html>
