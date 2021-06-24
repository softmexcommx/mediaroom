var vm = new Vue({
  el: "#app-documents",
  created: function() {
     this.getDocuments();
  },
  data: {
    documents: [],  
   },
  methods: {    
    getDocuments: function() {      
      axios
        .get('/mediaroom/documents/select/areas', { params:{
          idArea: laraveljs.idArea
        }} )
        .then(response => {
          this.documents = response.data;          
        })
        .then(response => {
      
        })
        .catch(error => {
          toastr.error(error, "Carga de documents", { closeButton: true });
        });
    },

  }

});