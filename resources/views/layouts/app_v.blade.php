<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  
  <title>{{ config('app.name') }}</title>

</head>
<body>
  <div id="app">
    <v-app>
      <v-toolbar>
        <v-toolbar-title>
            <v-btn icon href="{{ url('/') }}">
              <v-icon>home</v-icon>
            </v-btn>          
        </v-toolbar-title>
        <v-spacer></v-spacer>
        @guest
            <v-btn color="success" href="{{ route('login') }}">
                <span>{{ __('Login') }}</span>
            </v-btn>
            @if (Route::has('register'))
                <v-btn color="success" href="{{ route('register') }}">
                    <span>{{ __('Registro') }}</span>
                </v-btn>
            @endif
        @endguest        
      </v-toolbar>         
      <v-content>
        @yield('content')
      </v-content>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
  <script>
    new Vue({ el: '#app' })
  </script>
</body>
</html>