
var vm = new Vue({
    el: '#appPermisos',
    created: function(){ 
        this.getPermisosAct();   
        this.getPermisosDisp();                
    },    
    data: {      
        permisosAct: [],                   
        permisosDisp: [],     
        idPerfil:'0',              
        errors2: []     
    },    
    methods: {         
        getPermisosAct: function(){                        
            axios.get('/roles/permisos/'+ laraveljs.idPerfil +'/true').then(response => {
                this.idPerfil = laraveljs.idPerfil;
                this.permisosAct = response.data;  
			
            });
        },
        getPermisosDisp: function(){                        
            axios.get('/roles/permisos/'+ laraveljs.idPerfil +'/false').then(response => {
                this.permisosDisp = response.data;                           
            });
        },
        addPermiso: function(item){                        
            axios.post('/roles/permiso/store/' + laraveljs.idPerfil + '/' + item.id).then(response => {
                if(response.data.codigo == '200'){                              
                    vm.getPermisosAct();   
                    vm.getPermisosDisp();      
                    toastr.success(response.data.descripcion, '¡Notificación!');
                    }else{                        
                        toastr.error(response.data.error, '¡Notificación!');
                    }                 
            });
        },
        deletePermiso: function(item){                       
            swal({
                title: "Eliminar Permiso",
                text: "¿Estás seguro que quieres eliminar este permiso ?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: true,
                confirmButtonText: "Si, eliminarla!",
                confirmButtonColor: "#ec6c62"
            },
            function() {
    
                axios.delete('/roles/permiso/destroy/' + laraveljs.idPerfil + '/' + item.id).then(response => {
                    if(response.data.codigo == '200'){                              
                        vm.getPermisosAct();   
                        vm.getPermisosDisp();      
                        toastr.success(response.data.descripcion, '¡Notificación!');
                        }else{                        
                            toastr.error(response.data.error, '¡Notificación!');
                        }                             
                });
    
            });
           
        }

    }
   
});