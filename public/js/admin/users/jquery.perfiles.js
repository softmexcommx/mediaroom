$(function() {     

    $('#tablePerfiles').footable();
    
    $.ajax({
        type: 'GET',      
        url: "/api/dt/perfiles/1",
        dataType: 'json',
        success: function(data) {
            if (data.length == 0) {
                toastr.warning('No existen perfiles disponibles', 'Notificación');
            } else {
                  
                var cadenaHTML=""; 
                $.each(data, function(i, item) {               
                 cadenaHTML += '<tr>';                                  
                 cadenaHTML += '<td>' + item.name + '</td>';                                                                                                                                                  
                 cadenaHTML += '<td class="client-status">';
                 cadenaHTML += '<a title="Editar" class="btn btn-xs btn-success btn-outline" data-toggle="tooltip" data-placement="right"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;';
                 cadenaHTML += '<a title="Permisos" class="btn btn-xs btn-success btn-outline"  href="JavaScript:showPermisos('+ item.id + ')"><i class="fa fa-arrow-circle-o-right"></i></a>'; 
                 cadenaHTML += '</td>';
                 cadenaHTML += '</tr>';
                });
                
                $("#rowPerfiles").empty().append(cadenaHTML);   

                $(".footable").each(function() {          
                    $(this).footable();
                });
                
            }            
        },
        //Mensaje de error en caso de fallo
        error: function(ex) {
            toastr.error(ex, '¡Notificación!')
        }
    });

      
   
    
  });


  function showPermisos(id){
    
    $.ajax({
        type: 'GET',      
        url: "/api/dt/perfiles/permisos/" + id,
        dataType: 'json',
        success: function(data) {
            if (data.length == 0) {
                toastr.warning('No existen perfiles disponibles', 'Notificación');
            } else {
                  
                var cadenaHTML=""; 
                $.each(data, function(i, item) {               
                 cadenaHTML += '<tr>';                                  
                 cadenaHTML += '<td>' + item.name + '</td>';         
                 cadenaHTML += '<td>' + item.description + '</td>';                                                                                                                                                  
                 cadenaHTML += '<td>';
                 cadenaHTML += '<a title="Permisos" class="btn btn-xs btn-success btn-outline"  href="JavaScript:showPermisos('+ item.id + ')"><i class="fa fa-arrow-circle-o-right"></i></a>'; 
                 cadenaHTML += '</td>';    
                 cadenaHTML += '</tr>';
                });
                
                $("#rowPerfilPermisos").empty().append(cadenaHTML);   
                                      
                $(".footable2").each(function() {          
                    $(this).footable();
                });
            }            
        },
        //Mensaje de error en caso de fallo
        error: function(ex) {
            toastr.error(ex, '¡Notificación!');
        }
    });

}
