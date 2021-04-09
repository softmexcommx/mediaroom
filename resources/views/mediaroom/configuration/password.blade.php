


        {!! Form::open(array('method' => 'PUT', 'id' => 'frm-pwd' , 'action' => array('SicenetEnLinea\Configuration\UserController@passwordupdate'))) !!}    
      
<div class="modal face" id="updatePassword">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

        <div class="modal-header modal-header-primary">
            <h3>Cambiar Contraseña</h3>
        </div>
        <div class="modal-body">
                       <div class="row" id="pwd-container">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control example1" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="pwstrength_viewport_progress"></div>
                                        </div>
                                    </div>
                        </div>                               
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>                   
             {!! Form::submit("Cambiar",['class'=>'btn btn-sm btn-warning pull-right']) !!}
        </div>
    </div>
  </div>
</div>
    

   {!!Form::close()!!}






