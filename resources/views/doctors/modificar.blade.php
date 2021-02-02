@extends('layouts/app')
@section('titulo', 'Modificar Curso')
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


        <!-- Modal actualizar-->

        <div id="modal-edit">
            @foreach ($sql as $i)
                <h3 class="text-center" style="margin-bottom: 35px">MODIFICAR DOCTOR</h3>
                <form action="{{ route('doctor.update') }}" method="POST">
                    <input type="hidden" name="id" value="{{ $i->id_doctor }}">
                    @csrf
                    
                    
                    <div class="form-row col-12">
                        @error('nombre')
                            <small>*{{ $message }}</small>
                        @enderror
                        <input type="text" placeholder="Nombre del paciente" name="nombre" id="nombre" value="{{ $i->ape_nom }}">
                    </div>
    
                    <div class="form-row col-12">
                        @error('dni')
                            <small>*{{ $message }}</small>
                        @enderror
                        <input type="text" placeholder="Dni" name="dni" id="dni" value="{{ $i->dni }}">
                    </div>
    
                    <div class="form-row col-12">
                        @error('especialidad')
                            <small>*{{ $message }}</small>
                        @enderror
                        <input type="text" placeholder="Celular" name="especialidad" id="celular" value="{{ $i->especialidad }}">
                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('doctor.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
                        <button type="submit" id="boton" class="btn btn-primary">MODIFICAR</button>
                    </div>
                </form>
            @endforeach
        </div>


@endsection
