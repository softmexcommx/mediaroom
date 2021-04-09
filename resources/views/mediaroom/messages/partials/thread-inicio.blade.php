<div class="feed-element">
    <a href="{{ route('messages.show', $thread->id) }}" class="pull-left">      
        <img alt="image" class="img-circle" src="{!! asset($thread->latestMessage->user->foto) !!}" width="50" height="50" />
    </a>
    <div class="media-body">
       
        <strong> {{ $thread->latestMessage->user->name }}</strong><br>
        
        {!! str_limit($thread->latestMessage->body, $limit = 20, $end = '...') !!}
        <br>
        <small class="text-muted">{{ $thread->latestMessage->created_at }}</small>
    </div>
</div>

