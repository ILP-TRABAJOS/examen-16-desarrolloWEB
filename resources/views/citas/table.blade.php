@extends('layouts/app')
{{-- @section('titulo', 'Lista Cursos') --}}
@section('content')
<script>
    function confirmarEliminar() {
                var res = confirm("Estas seguro que deseas eliminar");
                if (res == true) {
                    return true;
                } else {
                    return false;
                }
            }

</script>

@if (session('correcto'))
<script>
    $(function() {
                    new PNotify({
                        title: 'correcto',
                        type: 'success',
                        text: "{{ session('correcto') }}",
                        styling: 'bootstrap3'
                    })
                })

</script>
@endif

@if (session('incorrecto'))
<script>
    $(function() {
                    new PNotify({
                        title: 'correcto',
                        type: 'error',
                        text: "{{ session('incorrecto') }}",
                        styling: 'bootstrap3'
                    })
                })

</script>
@endif

<div class="col-lg-12">
    <h3 class="text-center">LISTA DE CITAS</h3>
    <div class="text-right" style="margin-bottom: 5px;">
        <a href="{{ route('citas.create') }}" class="btn btn-primary"><i
                class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Cita</a>
    </div>
    <div class="text-right" style="margin-bottom: 5px;">
        <a target="_blank" href="{{ route('citaDetallepdf.index') }}" class="btn btn-success"><i
                class="fas fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;PDF</a>
    </div>
    <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
        <thead class="bg-primary">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    PACIENTE
                </th>
                <th>
                    FECHA
                </th>
                <th>
                    DOCTOR
                </th>
                <th>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($sql as $i)
            <tr>
                <td>{{ $i->id_cita }}</td>
                <td>{{ $i->paciente}}</td>
                <td>{{ $i->fecha_cita }}</td>
                <td>{{ $i->doctor }}</td>
                <td>
                    <a href="{{ route('citas.edit', $i->id_cita) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('citas.destroy', $i->id_cita) }}" onclick="return confirmarEliminar();"
                        class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection