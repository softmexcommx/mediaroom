	@if(count($errors) >0)
<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-exclamation-circle"></i> Error</h4>
                     <ul>
      	@foreach ($errors->all() as $error)
      		<li>{!!$error!!}</li>
      	@endforeach
      </ul>
 </div>
@endif