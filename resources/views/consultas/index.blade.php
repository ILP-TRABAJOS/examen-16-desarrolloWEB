@extends('layouts/app')
@section('titulo', 'Consultas')

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

@if (session('buscar'))
<script>
    $(function() {
                    new PNotify({
                        title: 'correcto',
                        type: 'error',
                        text: "{{ session('buscar') }}",
                        styling: 'bootstrap3'
                    })
                })

</script>
@endif

<div class="col-lg-12">
    <h3 class="text-center">LISTA DE CONSULTAS</h3>
    <div class="text-right" style="margin-bottom: 5px;">
        <a href="{{ route('consultas.create') }}" class="btn btn-primary"><i
                class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Consulta</a>
    </div>
    <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
        <thead class="bg-primary">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    DESCRIPCION
                </th>
                <th>
                    PRECIO
                </th>
                <th>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($sql as $i)
            <tr>
                <td>{{ $i->id_consulta }}</td>
                <td>{{ $i->descripcion }}</td>
                <td>{{ $i->precio }}</td>
                <td>
                    <a href="{{ route('consultas.edit', $i->id_consulta) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('consultas.delete', $i->id_consulta) }}" onclick="return confirmarEliminar();"
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