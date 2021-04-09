@if(Auth::check())
    <?php
    $count = Auth::user()->newThreadsCount();
    $cssClass = $count == 0 ? 'hidden' : '';
    ?>  





<li class="dropdown">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            
            <i class="fa fa-envelope"></i>  
         
                <span id="unread_messages" class="label label-warning {{ $cssClass }}">{{ $count }}</span>
        </a>
        <ul class="dropdown-menu dropdown-messages">
                @foreach(Auth::user()->threadsWithNewMessages() as $thread)
                <li>
                    <div class="dropdown-messages-box">
                        <a href="{{ route('messages.show', $thread->id) }}" class="pull-left">
                            <img alt="image" class="img-circle" src="{!! asset($thread->latestMessage->user->foto) !!}" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <small class="pull-right">{{ \Carbon\Carbon::parse($thread->created_at)->diffForHumans() }}</small>
                         
                            <strong> {{ $thread->latestMessage->user->name }}</strong><br>
                
                            {!! str_limit($thread->latestMessage->body, $limit = 20, $end = '...') !!}
                            <br>
                            <small class="text-muted">{{ $thread->latestMessage->created_at }}</small>



                        </div>
                    </div>
                </li>              
                <li class="divider"></li>
                @endforeach
                <li>
                    <div class="text-center link-block">
                        <a href="/messages">
                            <i class="fa fa-envelope"></i> <strong>{{ trans('textos.navegacion.leermensajes') }}</strong>
                        </a>
                    </div>
                </li>
            </ul>
    </li>
    @endif

