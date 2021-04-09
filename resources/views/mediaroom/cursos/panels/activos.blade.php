<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($cursosActivos as $cursoActivo)
        <div class="swiper-slide">



            <div class="card">
                <img class="card-img-top" src="{{ asset($cursoActivo->accion->ue->imagen) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $cursoActivo->accion->ue->ue_descripcion }}</strong></h5>

                    @if($cursoActivo->insc_activo == 2 && $cursoActivo->accion->inTime == true)
                    <h6 class="float-right">{{ $cursoActivo->avance }}%</h6>
                    <h6 class="float-left">Avance</h6><br>


                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $cursoActivo->avance }}%"
                            role="progressbar" aria-valuenow="{{ $cursoActivo->avance }}" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    @elseif($cursoActivo->insc_activo == 2)
                    <span class="btn btn-primary btn-xs btn-block">
                        <i class="fa fa-check"></i>CONFIRMADO
                    </span>
                    @endif


                </div>
                <div class="card-footer text-muted">
                    @if($cursoActivo->insc_activo == 2 && $cursoActivo->accion->inTime == true)
                    <a href="{{ route('sicenet_enlinea.cursos.show',['insc_cve' => $cursoActivo->insc_cve]) }}"
                        class="btn btn-primary btn-sm btn-block {{ $cursoActivo->insc_activo == 2 ? '' : 'disabled' }}"><i
                            class="fa fa-play"></i>
                        Continuar</a>
                    @else
                    <span class="btn btn-warning btn-sm btn-block">Inicio:
                        {{ \Carbon\Carbon::parse($cursoActivo->accion->acc_fecini)->format('d-m-Y') }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach


    </div>
    <!-- Add Pagination -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>