@if($tipo == 1)
<div class="embed-responsive embed-responsive-16by9">
    <iframe width="100%" height="500" src="//www.youtube.com/embed/{{ $url }}" frameborder="0" allowfullscreen></iframe>
</div>
@elseif($tipo == 2)
<div class="embed-responsive embed-responsive-16by9">
    <iframe width="100%" height="500" class="embed-responsive-item" src="{{ asset('store/ue/files/pdf/'.$url) }}"
        frameborder="0"></iframe>
</div>
@endif

@if($tipo == 5)
<div id="audioPanel" class="audiogallery skin-wave" style="opacity:0; margin-top: 70px;">
    <div class="items">
        <div id="ap1000" class="audioplayer-tobe  skin-wave"
            data-thumb="{{ asset('/store/image/logos/logocncyc.png')  }}"
            data-thumb_link="{{ asset('/store/image/logos/logocncyc.png')  }}" data-videoTitle="{{ $title }}"
            data-type="audio" data-source="{{ asset('/store/ue/audios/' . $url ) }}">
            <div class="meta-artist">
                <span class="the-artist"></span><span class="the-name">{{ $title }}</span>
            </div>
        </div>
    </div>
</div>
@endif