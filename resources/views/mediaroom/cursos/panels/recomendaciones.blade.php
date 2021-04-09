<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($cursos as $accion)
        <div class="swiper-slide">
            <div class="card">
                <img class="card-img-top" src="{{ asset($accion->ue->imagen) }}"
                    alt="{{ $accion->ue->ue_descripcion }}">
                <div class="card-body">


                    <h5 class="card-title">{{ $accion->ue->ue_descripcion }}</strong></h5>

                    <small class="text-muted">

                    </small>
                    <h5><i class="fa fa-calendar"></i>&nbsp;Del
                        {{ \Carbon\Carbon::parse($accion->acc_fecini)->format('d-m-Y') }} al
                        {{ \Carbon\Carbon::parse($accion->acc_fecfin)->format('d-m-Y') }}</h5>



                    <div class="row">
                        <div class="col-md-8">
                            <h5>
                                <i class="fa fa-map-marker"></i>&nbsp;{{ $accion->centro->cen_desccorta }}
                            </h5>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>
                                <i class="fa fa-clock-o"></i>&nbsp;{{ $accion->acc_durhor }}
                                hrs.
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ $accion->modalidad->mod_descripcion }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="#" onclick="showAccion('{{ $accion->acc_cve }}')" class="btn btn-primary btn-sm btn-block">
                        VER DETALLES</a>
                </div>
            </div>
        </div>

        @endforeach



    </div>
    <!-- Add Pagination -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>