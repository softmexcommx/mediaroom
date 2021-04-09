
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
            var url ='/api/dt/perfil/'+ laraveljs.idPerfil +'/permisos';
            axios.get(url).then(response => {
                this.idPerfil = response.data.valores.idPerfil;
                this.permisosAct = response.data.valores.permisos;                           
            });
        },
        getPermisosDisp: function(){            
            var url ='/api/dt/perfil/'+ laraveljs.idPerfil +'/disponibles';
            axios.get(url).then(response => {
                this.permisosDisp = response.data;                           
            });
        },
        addPermiso: function(item){            
            var url ='/configuration/perfil/' + this.idPerfil + '/addpermiso/' + item.id
            axios.get(url).then(response => {
                if(response.data.codigo == '200'){                              
                    vm.getPermisosAct();   
                    vm.getPermisosDisp();      
                    toastr.success(response.data.mensaje, '¡Notificación!');
                    }else{                        
                        toastr.error(response.data.error, '¡Notificación!');
                    }                 
            });
        },
        deletePermiso: function(item){            
            var url ='/configuration/perfil/' + this.idPerfil + '/deletepermiso/' + item.id

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
    
                axios.get(url).then(response => {
                    if(response.data.codigo == '200'){                              
                        vm.getPermisosAct();   
                        vm.getPermisosDisp();      
                        toastr.success(response.data.mensaje, '¡Notificación!');
                        }else{                        
                            toastr.error(response.data.error, '¡Notificación!');
                        }                             
                });
    
            });
           
        }

    }
   
});