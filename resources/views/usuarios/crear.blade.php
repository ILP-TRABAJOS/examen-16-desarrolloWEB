@extends('layouts/app')
@section('titulo', 'Registro Curso')
@section('content')
        @if (session('correcto'))
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: 'CORRECTO',
                        type: 'success',
                        text: "{{ session('correcto') }}",
                        styling: 'bootstrap3'
                    });
                })

            </script>
        @endif
        @if (session('incorrecto'))
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: 'ERROR',
                        type: 'warning',
                        text: "{{ session('incorrecto') }}",
                        styling: 'bootstrap3'
                    });
                })

            </script>
        @endif

        @if (session('duplicado'))
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: 'ERROR',
                        type: 'warning',
                        text: "{{ session('duplicado') }}",
                        styling: 'bootstrap3'
                    });
                })

            </script>
        @endif

        <div class="modal-body" id="modal-create">
            <h3 class="text-center" style="margin-bottom: 55px">REGISTRO DE NUEVO CURSO</h3>
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="form-row col-12">
                    @error('nombre')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="text" placeholder="Nombre completo del usuario" name="nombre" id="nombre" value="{{ old('nombre') }}">
                </div>

                <div class="form-row col-12">
                    @error('usuario')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="text" placeholder="usuario" name="usuario" id="usuario" value="{{ old('usuario') }}">
                </div>

                <div class="form-row col-12">
                    @error('password')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="password" placeholder="password" name="password" id="password" value="{{ old('password') }}">
                </div>

                <div class="modal-footer">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
                    <button type="submit" id="boton" class="btn btn-primary">REGISTRAR</button>
                </div>
            </form>
        </div>
@endsection
