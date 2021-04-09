const config = {
    errorBagName: 'errors', // change if property conflicts
    fieldsBagName: 'fields', 
    delay: 0, 
    locale: 'es',    
    strict: true, 
    classes: false, 
    classNames: {
      touched: 'touched', // the control has been blurred
      untouched: 'untouched', // the control hasn't been blurred
      valid: 'valid', // model is valid
      invalid: 'invalid', // model is invalid
      pristine: 'pristine', // control has not been interacted with
      dirty: 'dirty' // control has been interacted with
    },
    events: 'input|blur',
    inject: true,
    validity: false,
    aria: true
  };

  Vue.use(VeeValidate, config); 

var vm = new Vue({
    el: '#appUsuario',
    created: function(){ 
        this.getUsuarios();        
        
        
       
    },    
    data: {      
        usuarios: [],                 
        search:'',
        id: '0',
        name:'',        
        email:'',
        role_id:'',
        foto:'',        
        perfil:'',
        edo: false,
        errors2: []  ,                              
    },
    methods: {   
          
        getUsuarios: function(){
            var urlUs ='/data/users/ALL';
            axios.get(urlUs).then(response => {
                this.id =  '0';
                this.name = '';
           
                this.email = '';    
           
                this.foto =  ''; 
                this.perfil = '';
                this.edo = false;   
           
                this.role_id ='';           
                this.usuarios = response.data;                           
            });
        },
        loadUsuario: function(item){                         
                this.id =   item.id;
                this.name = item.name;             
                this.email = item.email;                 
                this.foto =  item.photo;  
                this.perfil = item.perfil.name;  
                this.edo = item.edo;    
                this.role_id = item.role_id;                                          
        },
         deleteUsuario: function(id){
                  
                    swal({
                        title: "¿Estás seguro?",
                        text: "¿Estás seguro que quieres bloquear este usuario ?",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: true,
                        confirmButtonText: "Si, eliminarla!",
                        confirmButtonColor: "#ec6c62"
                    },
                    function() {
            
                        axios.delete('/users/destroy/'+ id).then(response => {
                            if(response.data.codigo == '200'){                              
                            this.usuarios = '';
                            vm.getUsuarios();
                             toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!')    
                            }
                        });
            
                    });
    },
 
    activaUsuario: function(id){
                    var urlUser ='/configuration/users/'+ id; 
                    swal({
                        title: "¿Estás seguro?",
                        text: "¿ Desea desbloquear este usuario ?",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: true,
                        confirmButtonText: "Si, desbloquear!",
                        confirmButtonColor: "#3578bf"
                    },
                    function() {
            
                        axios.get(urlUser).then(response => {
                            if(response.data.codigo == '200'){                              
                            this.usuarios = '';
                            vm.getUsuarios();
                             toastr.success(response.data.mensaje, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!')    
                            }
                        });
            
                    });
	}
    },
  
    computed:{

        searchUsuarios: function (){
            return this.usuarios.filter((item) => item.name.includes(this.search));
        }
    }
});