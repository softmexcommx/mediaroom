@if(Auth::check())
<?php
$countN = Auth::user()->unreadNotifications->count();
$cssClassN = $countN == 0 ? 'hidden' : '';
?>


<li class="dropdown">
    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">

        <i class="fa fa-bell"></i>

        <span id="unread_notificacion" class="label label-primary {{ $cssClassN }}">{{ $countN }}</span>
    </a>
    <ul class="dropdown-menu dropdown-alerts">
        @foreach(Auth::user()->unreadNotifications as $notif)

        @php
        $data = json_encode($notif->data);
        $data = json_decode($data);
        @endphp

        <li>


            <a href="{{ route($data->url, [$data->div_id, $notif->id ]) }}">
                <div>
                    <i class="fa {!! $data->icon !!} fa-fw"></i>
                    {!! $data->notif_subject !!}
                    <span class="pull-right text-muted small">
                        {{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</span>
                </div>
            </a>

        </li>
        <li class="divider"></li>
        @endforeach

        @if(Auth::user()->unreadNotifications->count() == 0)
        <li>
            <div class="text-center link-block">
                <strong>{{ trans('textos.navegacion.vacionotificaciones') }}</strong>

            </div>
        </li>
        @endif

    </ul>
</li>
@endif