<!doctype html>
<html lang="pt_br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'App Max') }}</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('mask/jquery.mask.js') }}" defer></script>
      <script src="{{ asset('mask/mask.js') }}" defer></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   </head>
   <body>
      <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               <a class="navbar-brand" href="#">
               @guest
               Estoque e controle de produtos
               @endguest
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">
                     @guest
                     @else
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/produtos') }}">
                        {{ __('Produtos') }}
                        </a>
                     </li>
                     <li class="nav-item dropdown">
                        <a id="navbarDropdownEstoque" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('Estoque') }}<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownEstoque">
                           <a class="dropdown-item" href="{{ route('adicionar-produto.create')}}">
                           {{ __('Adicionar Produtos Estoque') }}
                           </a>
                           <a class="dropdown-item" href="{{ route('baixa-produto')}}">
                           {{ __('Baixar Produtos Estoque') }}
                           </a>
                        </div>
                     </li>
                     <li class="nav-item">
                       <li class="nav-item dropdown">
                          <a id="navbarDropdownRel" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ __('Relatorios') }}<span class="caret"></span>
                          </a>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownRel">
                           <a class="dropdown-item" href="{{ route('rel-produtos-adicionados')}}">
                           {{ __('Adicionados ao Estoque') }}
                           </a>
                           <a class="dropdown-item" href="{{ route('rel-produtos-baixa')}}">
                           {{ __('Removidos do Estoque') }}
                           </a>
                        </div>
                     </li>
                     @endguest
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                     @guest
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                     </li>
                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                     @endif
                     @else
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                           {{ __('Sair') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </div>
                     </li>
                     @endguest
                  </ul>
               </div>
            </div>
         </nav>
         <main class="py-4">
            @yield('content')
         </main>
      </div>
   </body>
</html>
