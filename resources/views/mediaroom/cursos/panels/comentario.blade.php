<input type="hidden" id="tema_cve" name="tema_cve" value="{{ $tema->tema_cve }}">
<input type="hidden" id="avatem_cve" name="avatem_cve" value="{{ $avaTem->avatem_cve }}">
<div class="social-comment">
    <a href="#" class="float-left">
        <img alt="image" src="{!! asset(Auth::user()->photo) !!}">
    </a>
    <div class="media-body">
        <textarea id="new_comentario" name="new_comentario" class="form-control"
            placeholder="Escriba un comentario..."></textarea>
    </div>
    <br>
    <div class="btn-group  pull-right">
        <button id="newComentario" onclick="newComentario()" class="btn btn-success btn-xs"><i
                class="fa fa-send"></i>&nbsp;Enviar</button>
    </div>

</div>
<br><br>
<hr>

@foreach($comentarios->sortByDesc('accblog_fecadd') as $comentario)
<div class="social-avatar">
    <a href="" class="float-left">
        <img alt="image" src="{!! asset($comentario->user->photo) !!}">
    </a>
    <div class="media-body">
        <a href="#">
            {{  $comentario->user->nameComplete }}
        </a>
        <small class="text-muted">Publicado hace {{ $comentario->accblog_fecadd->diffForHumans() }}</small>
    </div>
</div>
<div class="social-body">
    <p>
        {{ $comentario->accblog_comentario }}
    </p>

    <div class="btn-group">
        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Me gusta!</button>
        <a class="btn btn-white btn-xs" data-toggle="collapse" href="#collapse{{ $comentario->accblog_cve }}Replica"
            role="button" aria-expanded="false" aria-controls="#collapse{{ $comentario->accblog_cve }}Replica">
            <i class="fa fa-comments"></i> Comentar
        </a>
    </div>

    <div class="collapse" id="collapse{{ $comentario->accblog_cve }}Replica">
        <br>
        <div class="social-comment">
            <a href="#" class="float-left">
                <img alt="image" src="{!! asset(Auth::user()->photo) !!}">
            </a>
            <div class="media-body">
                <textarea id="replica_comentario" name="replica_comentario" class="form-control"
                    placeholder="Escriba un comentario..."></textarea>
            </div>
            <br>
            <div class="btn-group  pull-right">
                <button id="replicaComentario" onclick="replicaComentario('{{ $comentario->accblog_cve }}')"
                    class="btn btn-success btn-xs"><i class="fa fa-send"></i>&nbsp;Enviar</button>
            </div>
        </div>
    </div>
    <br> <br>
    <div class="social-footer">

        @foreach($comentario->comentarios as $comentario)
        <div class="social-comment">
            <a href="" class="float-left">
                <img alt="image" src="{!! asset('/store/image/photos/' .$comentario->user->photo) !!}">
            </a>
            <div class="media-body">
                <a href="#">
                    {{ $comentario->user->nameComplete }}
                </a>
                {{ $comentario->accblog_comentario }}
                <br />

                <small class="text-muted">Publicado hace {{ $comentario->accblog_fecadd->diffForHumans() }}</small>
            </div>
        </div>
        @endforeach



    </div>

</div>


@endforeach