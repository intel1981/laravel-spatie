<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Laravel</title>
</head>
<body>
  <div id="app">
    <v-app class="grey lighten-5">      
      <v-toolbar flat  color="grey lighten-5">
        <v-toolbar-title>          
        </v-toolbar-title>
        <v-spacer></v-spacer>
        @if (Route::has('login'))
          @auth
            <v-btn outline flat color="indigo" href="{{ route('home') }}" >
              <span class="font-weight-regular">Home</span>
              <v-icon right color="indigo">home</v-icon>          
            </v-btn>
          @else
            <v-btn outline flat color="blue" href="{{ route('login') }}">
              <span class="font-weight-regular">Iniciar Sesión</span>
              <v-icon right color="blue">input</v-icon>          
            </v-btn>
            @if (Route::has('register'))
              <v-btn outline flat color="indigo" href="{{ route('register') }}">
                <span class="font-weight-regular">Registro</span>
                <v-icon right color="indigo">how_to_reg</v-icon>          
              </v-btn>
            @endif
          @endauth            
        @endif       
      </v-toolbar>      
      <v-content>
        <v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex sm8 offset-sm1>
              <span class="display-2 font-weight-light indigo--text">G</span>
              <span class="display-2 font-weight-thin grey--text">estión y&nbsp;</span>
              <span class="display-2 font-weight-light indigo--text">A</span>
              <span class="display-2 font-weight-thin grey--text">dministración de&nbsp;</span>
              <span class="display-2 font-weight-light indigo--text">E</span>
              <span class="display-2 font-weight-thin grey--text">scuelas</span>             
            </v-flex>                       
          </v-layout>         
        </v-container> 
      </v-content>
      <v-footer height="auto" color="grey lighten-5">
      <v-layout justify-center row wrap>        
        <v-flex
          grey lighten-5
          text-xs-center
          indigo--text
          xs12
        >
          &copy; @{{ new Date().getFullYear() }} — <strong>v 1.0</strong>          
        </v-flex>
      </v-layout>
    </v-footer>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
  <script>
    new Vue({ el: '#app' })
  </script>
</body>
</html>