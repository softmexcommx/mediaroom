<div class="media">
    <a class="pull-left" href="#">     
             <img alt="image" class="img-circle" src="{!! asset($message->user->foto) !!}" width="50" height="50" />
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{!! $message->body !!}</p>
        <div class="text-muted">
            <small>Publicado hace {{ $message->created_at->diffForHumans() }}</small>            
        </div>
    </div>
</div>
<hr>