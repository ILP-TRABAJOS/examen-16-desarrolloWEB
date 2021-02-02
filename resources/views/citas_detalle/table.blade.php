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
                <a href="{{ route('citas-detalle.create') }}" class="btn btn-primary"><i
                        class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Detalle Cita</a>
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
                            CONSULTA
                        </th>
                        <th>
                            PRECIO
                        </th>
                        <th>
                            TOTAL
                        </th>
                        <th>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($sql as $i)
                        <tr>
                            <td>{{ $i->id_cita_detalle }}</td>
                            <td>{{ $i->paciente}}</td>
                            <td>{{ $i->fecha_cita }}</td>
                            <td>{{ $i->ape_nom }}</td>
                            <td>{{ $i->descripcion }}</td>
                            <td>{{ $i->precio }}</td>
                            <td>{{ $i->total }}</td>
                            <td>
                                <a href="{{ route('citas-detalle.edit', $i->id_cita_detalle) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('citas-detalle.destroy', $i->id_cita_detalle) }}"
                                    onclick="return confirmarEliminar();" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
