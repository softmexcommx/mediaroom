<div class="ibox ">
    <div class="ibox-title">
        <h5>Mensajes</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content ibox-heading">
        <h3><i class="fa fa-envelope-o"></i>Mensajes recientes</h3>
    </div>
    <div class="ibox-content">
        <div class="feed-activity-list">
            @foreach ($threads as $thread)
            <div class="feed-element">
                <div>
                    <small class="float-right text-navy">{{ $thread->latestMessage->created_at }}</small>

                    <a href="{{ route('sicenet_enlinea.messages.show', $thread->id) }}"><strong>
                            {{ $thread->latestMessage->user->name }}</strong>
                    </a>
                    <div>{!! str_limit($thread->latestMessage->body, $limit = 20, $end = '...') !!}
                    </div>
                    <small class="text-muted">{{ $thread->latestMessage->created_at->diffForHumans() }}</small>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</div>