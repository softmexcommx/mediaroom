@if(count($cursos) > 0)
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{ strtoupper('Lista de cursos concluIdos') }}</h5>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            <table class='table table-striped table-bordered' style="width:100%" id="tableCursos">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Curso </th>
                        <th>Inicio </th>
                        <th>Fin </th>
                        <th>Instructor </th>
                        <th>Status</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($cursos as $item)
                    <tr class="trSelect">
                        <td class="text-left">{{ $item->accion->acc_cve }}</td>
                        <td class="text-left">{{ $item->accion->ue->ue_descripcion }}</td>
                        <td data-sort='YYYYMMDD'>{{ \Carbon\Carbon::parse($item->accion->acc_fecini)->format('d-m-Y') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->accion->acc_fecfin)->format('d-m-Y') }}</td>
                        <td class="text-left">{{ $item->accion->asesor->user->data->nameComplete }}</td>
                        <td>

                            {!! HStatus::AccionEnLinea($item) !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@else
@include('alerts.message',['message' => 'NO CUENTA CON CURSO ACTIVOS POR EL MOMENTO'])
@endif