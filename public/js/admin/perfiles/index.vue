 
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
    el: '#appPerfiles',
    created: function(){ 
        this.getPerfiles();                
    },    
    data: {      
        perfiles: [],              
        name:'',
        description:'',
        fillPerfil: {
            'id' : '',
            'name':'',
            'description':''
            },       
        errors2: []     
    },    
    methods: {         
        getPerfiles: function(){            
            axios.get('/data/roles').then(response => {
                this.perfiles = response.data;                           
            });
        },
        CreatePerfil() {                   
            axios.post('/roles/store', {
                name: this.name,
                description: this.description                     
            }).then(response => {

                if(response.data.codigo == '200'){
                this.getPerfiles();
                this.name='';
                this.description='';
                this.errors2 = [];
                $('#createPerfil').modal('hide');
                toastr.success(response.data.descripcion, '¡Notificación!');
                }else{                        
                    toastr.error(response.data.error, '¡Notificación!');
                }
            }).catch(error => {                                  
                this.errors2 = error.response.data;
            });    
         },   
         editPerfil: function(item){            
            this.fillPerfil.id =  item.id;        
            this.fillPerfil.name = item.name;
            this.fillPerfil.description = item.description;
            $('#editPerfil').modal('show');

}, 
            updatePerfil: function(id){                                               
                        axios.put('/roles/update/' + id,this.fillPerfil).then(response => {
                            if(response.data.codigo == '200'){              
                                vm.getPerfiles();            
                                
                                fillUsuario = {'id' : '','name':'', 'description':''};                         
                                this.errors2 = [];
                            $('#editPerfil').modal('hide');
                            toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!');
                            }
                        }).catch(error => {
                            console.log(error);
                            //this.errors2 = error.response.data;
                        });

            },                       
         deletePerfil: function(item){
          
            swal({
                title: "Bloquear Perfil",
                text: "¿Estás seguro que quieres bloquear este perfil ?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: true,
                confirmButtonText: "Si, eliminarla!",
                confirmButtonColor: "#ec6c62"
            },
            function() {
    
                axios.delete('/roles/destroy/'+ item.id).then(response => {
                    if(response.data.codigo == '200'){                              
                    this.perfiles = '';
                    vm.getPerfiles();
                     toastr.success(response.data.mensaje, '¡Notificación!');
                    }else{
                        toastr.error(response.data.error, '¡Notificación!')    
                    }
                });
    
            });
            },
            activarPerfil: function(item){              
                swal({
                    title: "Activar Perfil",
                    text: "¿ Desea desbloquear este perfil ?",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: true,
                    confirmButtonText: "Si, desbloquear!",
                    confirmButtonColor: "#3578bf"
                },
                function() {
        
                    axios.get('/roles/destroy/'+ item.id).then(response => {
                        if(response.data.codigo == '200'){                              
                        this.perfiles = '';
                        vm.getPerfiles();
                         toastr.success(response.data.mensaje, '¡Notificación!');
                        }else{
                            toastr.error(response.data.error, '¡Notificación!')    
                        }
                    });
        
                });
},
    }
   
});