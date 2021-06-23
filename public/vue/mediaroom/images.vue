var vm = new Vue({
  el: "#app-images",
  created: function() {
     this.getAreas();
  },
  data: {
    areas: [],  
   },
  methods: {    
    getAreas: function() {      
      axios
        .get('/mediaroom/images/select/areas' )
        .then(response => {
          this.areas = response.data;
          console.log(this.areas);
        })
        .then(response => {
      
        })
        .catch(error => {
          toastr.error(error, "Carga de participantes", { closeButton: true });
        });
    },

  }

});