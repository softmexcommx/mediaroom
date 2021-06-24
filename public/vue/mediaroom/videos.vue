var vm = new Vue({
  el: "#app-videos",
  created: function() {
     this.getVideos();
  },
  data: {
    videos: [],  
   },
  methods: {    
    getVideos: function() {      
      axios
        .get('/mediaroom/videos/select/areas', { params:{
          idArea: laraveljs.idArea
        }} )
        .then(response => {
          this.videos = response.data;          
        })
        .then(response => {
      
        })
        .catch(error => {
          toastr.error(error, "Carga de videos", { closeButton: true });
        });
    },

  }

});