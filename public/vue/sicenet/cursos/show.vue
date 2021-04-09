var vm = new Vue({
  el: "#app-curso",
  created: function() {
    this.getParticipantes();
  },
  data: {
    participantes: [],  
    calificaciones : [],
    reactivos : [],
    countActivos: 0,
    countDelete: 0,  
    califEdit: false,  
    reactivoEdit: false,  
    idShow: 0,
    errors: [],
    califValida: true,
    reactivoValida: true,
    mensaje: '',
      msg: [],
  },
  methods: {    
    getParticipantes: function() {      
      axios
        .get(laraveljs.path + '/sicenet/mis_cursos/' + laraveljs.acc_cve + '/select/participantes' )
        .then(response => {
          this.participantes = response.data.data.participantes;
          this.countActivos=response.data.data.countActivos;
          this.countDelete=response.data.data.countDelete;
        })
        .then(response => {
          this.getCalificaciones();
        })
        .catch(error => {
          toastr.error(error, "Carga de participantes", { closeButton: true });
        });
    },
     getCalificaciones: function() {      
      axios
        .get(laraveljs.path + '/sicenet/mis_cursos/' + laraveljs.acc_cve + '/select/calificaciones' )
        .then(response => {
          this.calificaciones = response.data.data.calificaciones;                 
        })
        .then(response => {
          
        })
        .catch(error => {
          toastr.error(error, "Carga de calificaciones", { closeButton: true });
        });
    },
     getReactivos: function() {      
      axios
        .get(laraveljs.path + '/sicenet/mis_cursos/' + laraveljs.acc_cve + '/select/reactivos' )
        .then(response => {
          this.reactivos = response.data.data.reactivos;                 
        })
        .then(response => {
          
        })
        .catch(error => {
          toastr.error(error, "Carga de calificaciones", { closeButton: true });
        });
    },
     updateCalificaciones: function() {  
         axios
        .post(laraveljs.path + "/sicenet/mis_cursos/" + laraveljs.acc_cve + "/update/calificaciones", {
          calificaciones: this.calificaciones
        })
        .then(response => {
          if (response.data.codigo == 200) {
            this.califEdit = false;
            this.getCalificaciones();
            toastr.success(response.data.mensaje, "¡Notificación!", {
              closeButton: true
            });           
          } else {
            toastr.error(response.data.error, "Error", { closeButton: true });
          }
        })
        .catch(error => {
          toastr.error(response.data.data, "Error", { closeButton: true });
        });    
     
    },
      updateReactivos: function(tra) {  
         axios
        .post(laraveljs.path + "/sicenet/mis_cursos/" + laraveljs.acc_cve + "/update/reactivos", {
             tra: tra
        })
        .then(response => {
          if (response.data.codigo == 200) {
            this.reactivoEdit = false;
            this.getReactivos();
            toastr.success(response.data.mensaje, "¡Notificación!", {
              closeButton: true
            });           
          } else {
            toastr.error(response.data.error, "Error", { closeButton: true });
          }
        })
        .catch(error => {
          toastr.error(response.data.data, "Error", { closeButton: true });
        });    
     
    },
     eliminarParticipante: function(tra) {      
          swal({
            title: "Eliminar participante",
            text: "¡Se va a eliminar un registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((confirm) => {
            if(confirm){
              axios.delete(laraveljs.path + "/sicenet/mis_cursos/" +
                    laraveljs.acc_cve +
                    "/participante/destroy", {
              params: {
                tra_cve: tra.insc_tracve,
                insc_cve: tra.insc_cve
              }
            })
            .then(response => {
              if (response.data.codigo == 200) {
                vm.getParticipantes();                
                toastr.success(
                  response.data.mensaje,
                  "¡Notificación!",
                  { closeButton: true }
                );
              } else {
                toastr.error(response.data.error, "Error", {
                  closeButton: true
                });
              }
            });
            }
          });
          
    },
     activarParticipante: function(tra) {      
             axios.post(laraveljs.path + "/sicenet/mis_cursos/" +
                    laraveljs.acc_cve +
                    "/participante/activate", {            
                tra_cve: tra.insc_tracve,
                insc_cve: tra.insc_cve              
            })
            .then(response => {
              if (response.data.codigo == 200) {
                vm.getParticipantes();                
                toastr.success(
                  response.data.mensaje,
                  "¡Notificación!",
                  { closeButton: true }
                );
              } else {
                toastr.error(response.data.error, "Error", {
                  closeButton: true
                });
              }
            });
    },
     showPanel(insc) {      
      if(this.idShow == 0){
        $('#tra-'+insc.insc_cve).addClass('show');
        this.idShow = insc.insc_cve;               
      }else{
          $('#tra-'+insc.insc_cve).removeClass('show');
        this.idShow = 0;    
      }       
    },
     showEdit(insc) {   
       if(this.reactivoEdit == false){         
        this.reactivoEdit = true;    
      }else{
        this.reactivoEdit = false;    
      }
       
    },
   validarCalif(tra, calif ) {
      

        if(tra.insc_evateo == 'null') tra.insc_evateo = 0; 
        if(tra.insc_evapra == 'null') tra.insc_evapra = 0;

        if((calif >= 1 && calif < 11) || calif > 100 || calif < 0 || calif == 'null'){
            this.califValida = false;
        }else{
            this.califValida = true;
        }
         tra.insc_evafin = (parseInt(tra.insc_evateo, 10) + parseInt(tra.insc_evapra, 10))/2;         
    },
      validarReactivo(tema, calif ) {      
        if(tema.avatem_calif == 'null') tema.avatem_calif = 0; 
        if(tema.avatem_puntos == 'null') tema.avatem_puntos = 0;

        this.mensaje = 'La calificación debe ser mayor a 10 y menor o igual a 100';

        if((calif >= 1 && calif < 11) || calif > 100 || calif < 0 || calif == 'null'){
            this.reactivoValida = false;
        }else{
            this.reactivoValida = true;
        }               
    },
     validarPuntos(tema, puntos ) {              
        if(tema.avatem_puntos == 'null') tema.avatem_puntos = 0;

        this.mensaje = 'Los puntos deben ser mayor a 0 y menor o igual a 10';

        if(puntos > 10 || puntos < 0 || puntos == 'null'){
            this.reactivoValida = false;
        }else{
            this.reactivoValida = true;
        }               
    }
  },

  });