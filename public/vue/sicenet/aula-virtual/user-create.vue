var vm = new Vue({
  el: "#app-av",
  created: function() {
    
  },
  data: {
   tra_matricula: '',
   user: null,
   trabajador: null,
   matriculaValida: true,
   emailValido: false,
   phoneValido: false,
   mensaje:'',
   mensajeError:'',
   option: 0,
    reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,    
  },
  methods: { 
	   searchUser: function() {      
      axios
        .get(laraveljs.path + '/sicenet/aula_virtual/search/user',{
    params: {
      matricula: this.tra_matricula
    }} )
        .then(response => {
          this.user = response.data.data.user;
		  this.trabajador =  response.data.data.trabajador;
		  this.tra_matricula = this.trabajador.tra_matricula;
		  this.mensaje = response.data.mensaje;
		  this.option = response.data.data.option;
		  console.log(this.option);
		 
        })
        .then(response => {
			
        })
        .catch(error => {
          toastr.error(error, "Search User", { closeButton: true });
        });
    },
	  storeUser: function() {  
         axios
        .post(laraveljs.path + '/sicenet/aula_virtual/users/create', {
             user: this.user,
			 trabajador: this.trabajador,
			 option : this.option
        })
        .then(response => {
			console.log(response.data.codigo);
          if (response.data.codigo == 200) {
				swal({
						title: "Registro exitoso",
						text: response.data.mensaje,
						icon: "success",
					})
          	.then((confirm) => {
           		 if(confirm){
						window.location.href = response.data.url;
					}
				 });
             
          } else {
            toastr.error(response.data.error, "Error", { closeButton: true });
          }
        })
        .catch(error => {
          toastr.error(response.data.error, "Error", { closeButton: true });
        });    
     
    },
	 isEmailValid: function() {

		this.emailValido = (this.user.email == "")? false : (this.reg.test(this.user.email)) ? true: false;  	

     
      return (this.user.email == "")? "" : (this.reg.test(this.user.email)) ? 'has-success' : 'has-error';
    },
	isEmailValidAlt: function() {
      return (this.user.usudis_coralt == "")? "" : (this.reg.test(this.user.usudis_coralt)) ? 'has-success' : 'has-error';
    },
     isPhoneValido() {          
     
           if(this.user.usudis_wa == 'null') this.user.usudis_wa = 0;    

        if(this.user.usudis_wa.length < 10 || this.user.usudis_wa == 'null'){
            this.phoneValido = false;
        }else{
            this.phoneValido = true;
        }     
       
    }

  }

});