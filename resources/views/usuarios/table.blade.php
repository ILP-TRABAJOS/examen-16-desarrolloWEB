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
                        type: 'error',
                        text: "{{ session('buscar') }}",
                        styling: 'bootstrap3'
                    })
                })

            </script>
        @endif

        <div class="col-lg-12">
            <h3 class="text-center">LISTA DE USUARIOS</h3>
            <div class="text-right" style="margin-bottom: 5px;">
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i
                        class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Usuario</a>
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
                            USUARIO
                        </th>
                        <th>
                            PASSWORD
                        </th>
                        <th>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($sql as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->ape_nom }}</td>
                            <td>{{ $i->usuario }}</td>
                            <td>{{ $i->password }}</td>
                            <td>
                                <a href="{{ route('usuarios.edit', $i->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('usuarios.destroy', $i->id) }}"
                                    onclick="return confirmarEliminar();" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form method="GET" action="{{ route('usuarios.buscar') }}">
            @csrf
            <div class="form-group">
                <input style="padding: 20px" class="form-control" type="text" placeholder="Ingrese el usuario para Buscar"
                    name="usuario" id="usuario" value="">
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
                            USUARIO
                        </th>
                        <th>
                            PASSWORD
                        </th>
                        <th>
                        </th>

                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('sql2') as $i)
                    <tr>
                        <td>{{ $i->id }}</td>
                        <td>{{ $i->ape_nom }}</td>
                        <td>{{ $i->usuario }}</td>
                        <td>{{ $i->password }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $i->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('usuarios.destroy', $i->id) }}"
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
