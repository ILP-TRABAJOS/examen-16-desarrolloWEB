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

        @if (session('buscar'))
            <script>
                $(function() {
                    new PNotify({
                        title: 'correcto',
                        type: 'warning',
                        text: "{{ session('buscar') }}",
                        styling: 'bootstrap3'
                    })
                })

            </script>
        @endif

        <div class="col-lg-12">
            <h3 class="text-center">LISTA DE DOCTORES</h3>
            <div class="text-right" style="margin-bottom: 5px;">
                <a href="{{ route('doctor.create') }}" class="btn btn-primary"><i
                        class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Doctor</a>
            </div>
            <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
                <thead class="bg-primary">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NOMBRES
                        </th>
                        <th>
                            DNI
                        </th>
                        <th>
                            ESPECIALIDAD
                        </th>
                        <th>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($sql as $i)
                        <tr>
                            <td>{{ $i->id_doctor }}</td>
                            <td>{{ $i->ape_nom }}</td>
                            <td>{{ $i->dni }}</td>
                            <td>{{ $i->especialidad }}</td>
                            <td>
                                <a href="{{ route('doctor.edit', $i->id_doctor) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('doctor.destroy', $i->id_doctor) }}"
                                    onclick="return confirmarEliminar();" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form method="GET" action="{{ route('doctor.buscar') }}">
            @csrf
            <div class="form-group">
                <input style="padding: 20px" class="form-control" type="text" placeholder="Ingrese el Dni para Buscar"
                    name="dni" id="dni" value="">
            </div>
            <button style="background: green;padding: 10px 20px;color: white" type="submit">Buscar</button>
        </form>
    
        @if (session('sql2'))
        <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
            <thead class="bg-primary">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        NOMBRES
                    </th>
                    <th>
                        DNI
                    </th>
                    <th>
                        ESPECIALIDAD
                    </th>
                    <th>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach (session('sql2') as $i)
                    <tr>
                        <td>{{ $i->id_doctor }}</td>
                        <td>{{ $i->ape_nom }}</td>
                        <td>{{ $i->dni }}</td>
                        <td>{{ $i->especialidad }}</td>
                        <td>
                            <a href="{{ route('doctor.edit', $i->id_doctor) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('doctor.destroy', $i->id_doctor) }}"
                                onclick="return confirmarEliminar();" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
@endsection
