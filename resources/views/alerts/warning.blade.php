@if(Session::has('message-warning'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4> <i class="icon fa fa-exclamation-triangle"></i> ¡Notificación!</h4>
    {!! Session::get('message-warning') !!}
</div>
@endif