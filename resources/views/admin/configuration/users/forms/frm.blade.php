<div class="row">
  <div class="col-md-6">


    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <label for="exampleInputuname">Nombre</label>

          {!! Form::text('name', null, ['class'=>'form-control', 'id' => 'name']) !!}
        </div>
      </div>
    </div>


    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <label for="exampleInputuname">Email</label>

          {!! Form::text('email', null, ['class'=>'form-control', 'id' => 'email']) !!}
        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="control-label">Perfil</label><br>

          <select name="role_id" id="role_id" class="form-control">
          </select>
        </div>

      </div>

    </div>

  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">


        </div>

      </div>

    </div>
    <div class="row" id="rowCompany">
      <div class="col-md-12">
        <div class="form-group">
          <label class="control-label">Empresas</label><br>
          {!!Form::select('companies[]', $companies , $myCompanies, ['id' => 'companies' ,'multiple', 'class' =>
          'form-control']) !!}

        </div>

      </div>

    </div>
    <div class="row" id="rowCustomer" style="display:none">
      <div class="col-md-12">

        <div class="form-group">
          <label class="control-label">Cliente</label><br>
          <select id="idCustomer" name="idCustomer" class="form-control">

          </select>

        </div>

      </div>

    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="form-group">
          <label class="control-label">Cuentas</label><br>
          {!!Form::select('accounts[]', $accounts , $myAccounts, ['id' => 'accounts' ,'multiple', 'class' =>
          'form-control']) !!}

        </div>

      </div>

    </div>

  </div>

</div>