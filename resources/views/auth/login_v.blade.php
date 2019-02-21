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
  
  <title>Iniciar Sesión</title>

</head>
<body>
  <div id="app">
    <v-app class="grey lighten-5">
      <v-toolbar flat color="grey lighten-5">
        <v-toolbar-title>
        	<v-btn fab outline small flat color="blue" href="{{ url('/') }}">		            	
            <v-icon>home</v-icon>                        
          </v-btn>
        </v-toolbar-title>
        <v-spacer></v-spacer>               
      </v-toolbar>         
      <v-content>
        <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card>
              <v-toolbar flat dark color="primary">
                <v-toolbar-title>
                	<span class="title font-weight-light">Iniciar sesión</span>
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-icon>input</v-icon>               
              </v-toolbar>
              <v-card-text>
                <v-form ref="form" @submit.prevent="validate" v-model="valid" lazy-validation>
                  <v-text-field 
                  name="user" 
                  id="user"
                  v-model= "user"
                  :rules="userRules" 
                  prepend-inner-icon="person"  
                  label="Correo electrónico" 
                  type="text"
                  >                  	
                  </v-text-field>
                  <v-text-field
                  v-model="password"
                  :rules="passwordRules"
                  :append-icon="show1 ? 'visibility_off' : 'visibility'"
                  name="password" 
                  id="password" 
                  prepend-inner-icon="lock"  
                  label="Contraseña" 
                  :type="show1 ? 'text' : 'password'"
                  @click:append="show1 = !show1"
                  >                  	
                  </v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn outline flat color="blue" href="{{ url('/') }}">		            	
		              <span class="font-weight-regular">Cancelar</span>                        
		            </v-btn>
                <v-btn                	
                	:disabled="!valid"
                	@click="validate"
                	color="primary"
                	>
                	<span class="font-weight-medium text-none">Iniciar sesión</span>
                </v-btn>                
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
      </v-content>
      <v-footer height="auto" color="blue lighten-2">
	      <v-layout justify-center row wrap>        
	        <v-flex	        	
	          blue lighten-2
	          text-xs-center	          
	          xs12
	          white--text
	        >
	          &copy; @{{ new Date().getFullYear() }} :: Gestión y Administración de Escuelas :: <strong>v 1.0</strong>          
	        </v-flex>
	      </v-layout>
    </v-footer>      
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
  <script>

    new Vue({ 
    	el: '#app',
    	data: () => ({
    		user: '',
    		userRules:[
    			v => !!v.trim() || 'Obligatorio',
    			v => /.+@.+/.test(v) || 'El correo electrónico no es valido'
    		],
    		password: '',
    		passwordRules: [
    		  v => !!v.trim() || 'Obligatorio',
    			v => (v || '').indexOf(' ') < 0 || 'No se permiten espacios en blanco'
    		],
    		show1: false,
    		valid: true,
    	}),
    	methods: {
    		validate () {
	        if (this.$refs.form.validate()) {	        	
	          console.log('enviar formulario')
	          axios.post('http://laravel-spatie.test/login', {
					    email: this.user,
					    password: this.password
					  })
					  .then(function (response) {
					    //console.log(response);
					    window.location.replace("http://laravel-spatie.test/home");
					  })
					  .catch(function (error) {
					    console.log(data.error);
					  });	          
	        }
	        else{
	        	console.log('formulario invalido')	
	        }
      	}
    	}
    })
  </script>
</body>
</html>