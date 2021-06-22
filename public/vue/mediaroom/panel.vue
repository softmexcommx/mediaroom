 
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
    el: '#appPanel',
    created: function(){ 
        this.getCategories();                               
    },    
    data: {      
        categories: [],
        areas: [],     
        files:[],            
        search:'',
        searchC:'',
        idArea: '0',
        nameArea:'',  		
        edo: false,
        category_idCategory: 0,
        idCategory: '0',
        nameCategory:'',  		
        edoC: false,
		  fillArea: {
            'idArea' : '',
            'nameArea':'',            
             'category_idCategory': '',
            },  
              fillCategory: {
            'idCategory' : '',
            'nameCategory':'',            
            },    
        errors2: []  ,                              
    },
    methods: {               
        getCategories: function(){            
            axios.get('/admin/catalogs/categories/index').then(response => {
                this.idCategory =  '0';
                this.nameCategory = '';           				
                this.edoC = false;                                 
                this.categories = response.data;                           
            });
        },  
         CreateCategory() {                   
            axios.post('/admin/catalogs/categories/store', {
                nameCategory: this.nameCategory,                                                     
            }).then(response => {
                if(response.data.codigo == '200'){
                this.getCategories();               
                this.nameCategory='';                             
                this.errors2 = [];
                $('#createCategory').modal('hide');
                toastr.success(response.data.descripcion, '¡Notificación!');
                }else{                        
                    toastr.error(response.data.error, '¡Notificación!');
                }
            }).catch(error => {                                  
                this.errors2 = error.response.data;
            });    
         },  
 editCategory: function(item){            
            this.fillCategory.idCategory=  item.idCategory;        
            this.fillCategory.nameCategory = item.nameCategory;                      
            $('#editCategory').modal('show');

}, 
    updateCategory: function(id){            
                                  
                        axios.put('/admin/catalogs/categories/update/' + id,this.fillCategory).then(response => {
                            if(response.data.codigo == '200'){              
                                vm.getCategories();                                            
                                fillCategory = {'idCategory' : '','nameCategory':''};                         
                                this.errors2 = [];
                            $('#editCategory').modal('hide');
                            toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!');
                            }
                        }).catch(error => {
                            console.log(error);
                            //this.errors2 = error.response.data;
                        });

            },   
              deleteCategory: function(id){                  
                    swal({
                        title: "Eliminación de categoria",
                        text: "¿ Desea eliminar la categoria ?",
                        type: "warning",
                         buttons: true,
            dangerMode: true
                   }).then(confirm => {
                        if (confirm) {        
                        axios.delete('/admin/catalogs/categories/destroy/'+ id).then(response => {
                            if(response.data.codigo == 200){                              
                           // this.categories = '';
                           this.getCategories();
                             toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!')    
                            }
                        });
                        }
                    });
    },
        activarCategory: function(id){
                   
                    swal({
                        title: "¿Estás seguro?",
                        text: "¿ Desea desbloquear esta categoria ?",
                        type: "warning",
                         buttons: true,
            dangerMode: true
                     }).then(confirm => {
                        if (confirm) {  
            
                        axios.delete('/admin/catalogs/categories/destroy/'+ id).then(response => {
                            if(response.data.codigo == '200'){                              
                            this.categories = '';
                            vm.getCategories();
                             toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!')    
                            }
                        });
                        }
                    });
	},
          getAreas: function(id){                         
                 axios.get('/admin/catalogs/areas/'+ id +'/index').then(response => {
                this.idCategory = id;
                this.idArea =  0;
                this.nameArea = '';           				
                this.edo = false;        
                this.category_idCategory = 0;                         
                this.areas = response.data;                           
            });                                       
        },                   
		  CreateArea() {                   
            axios.post('/admin/catalogs/areas/store', {                
                nameArea: this.nameArea,                
                category_idCategory:  this.idCategory                        
            }).then(response => {
                if(response.data.codigo == 200){
                this.getAreas(this.idCategory);
                this.nameArea='';                
                this.category_idCategory = 0;
                this.errors2 = [];
                $('#createArea').modal('hide');
                toastr.success(response.data.descripcion, '¡Notificación!');
                }else{                        
                    toastr.error(response.data.error, '¡Notificación!');
                }
            }).catch(error => {                                  
                this.errors2 = error.response.data;
            });    
         },   
		 editArea: function(item){   
             console.log(item);         
            this.fillArea.idArea =  item.idArea;        
            this.fillArea.nameArea = item.nameArea;
            this.fillArea.description = item.description;
            this.fillArea.category_idCategory = item.category_idCategory;
            $('#editArea').modal('show');

}, 
            updateArea: function(id){            
                                  
                        axios.put('/admin/catalogs/areas/update/' + id,this.fillArea).then(response => {
                            if(response.data.codigo == 200){              
                                this.getAreas(this.idCategory );                                            
                                fillArea = {'idArea' : '','nameArea':'', 'category_idCategory' : ''};                         
                                this.errors2 = [];
                            $('#editArea').modal('hide');
                            toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!');
                            }
                        }).catch(error => {
                            console.log(error);
                            //this.errors2 = error.response.data;
                        });

            },       
         deleteArea: function(id){                  
                    swal({
                        title: "Eliminación area",
                        text: "¿Desea eliminar el area ?",
                        type: "warning",
                         buttons: true,
            dangerMode: true
                    }).then(confirm => {
                        if (confirm) {          
                        axios.delete('/admin/catalogs/areas/destroy/'+ id).then(response => {
                            if(response.data.codigo == 200){                              
                           // this.areas = '';
                            this.getAreas(this.idCategory);
                             toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!')    
                            }
                        });
                        }
                    });
    },
 
    activarArea: function(id){
                   
                    swal({
                        title: "¿Estás seguro?",
                        text: "¿ Desea desbloquear este puesto ?",
                        type: "warning",
                         buttons: true,
            dangerMode: true
                  }).then(confirm => {
                        if (confirm) {   
                        axios.delete('admin/catalogs/areas/destroy/'+ id).then(response => {
                            if(response.data.codigo == '200'){                              
                            this.areas = '';
                            vm.getareas(this.idCategory);
                             toastr.success(response.data.descripcion, '¡Notificación!');
                            }else{
                                toastr.error(response.data.error, '¡Notificación!')    
                            }
                        });
                        }
                    });
	},
      getFiles: function(id){                         
                 axios.get('/admin/catalogs/areas/'+ id +'/files').then(response => {
                this.idArea = id;
                this.files = response.data;                           
            });                                       
        },     
    },
  
    computed:{

        searchAreas: function (){
            return this.areas.filter((item) => item.nameArea.includes(this.search));
        },
          searchCategories: function (){
            return this.categories.filter((item) => item.nameCategory.includes(this.searchC));
        }
    }
});