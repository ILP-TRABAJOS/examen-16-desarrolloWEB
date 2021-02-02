@extends('layouts/app')

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
            {{--
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
        @endif --}}

        

        <div class="modal-body" id="modal-create">
            <h3 class="text-center" style="margin-bottom: 55px">REGISTRO DE NUEVO DOCTOR</h3>
            <form action="{{ route('doctor.store') }}" method="POST">
                @csrf
                <div class="form-row col-12">
                    @error('nombre')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="text" placeholder="Nombre del doctor" name="nombre" id="nombre" value="{{ old('nombre') }}">
                </div>

                <div class="form-row col-12">
                    @error('dni')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="text" placeholder="Dni" name="dni" id="dni" value="{{ old('dni') }}">
                </div>

                <div class="form-row col-12">
                    @error('especialidad')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="text" placeholder="Especialidad" name="especialidad" id="especialidad" value="{{ old('especialidad') }}">
                </div>

                

                <div class="modal-footer">
                    <a href="{{ route('doctor.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
                    <button type="submit" id="boton" class="btn btn-primary">REGISTRAR</button>
                </div>
            </form>
        </div>
@endsection
