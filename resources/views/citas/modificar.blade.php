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
            <h3 class="text-center" style="margin-bottom: 35px">MODIFICAR CITA</h3>
            <form action="{{ route('citas.update') }}" method="POST">
                <input type="hidden" name="id" value="{{ $i->id_cita }}">
                @csrf


                <div class="form-row col-12">
                    @error('paciente')
                        <small>*{{ $message }}</small>
                    @enderror
                    <select name="paciente" id="paciente">
                        <option value="">seleccionar...</option>
                        @foreach ($sql2 as $item)
                            <option {{ $item->id_paciente == $i->id_paciente ? 'selected' : '' }}
                                value="{{ $item->id_paciente }}">{{ $item->ape_nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row col-12">
                    @error('fecha')
                        <small>*{{ $message }}</small>
                    @enderror
                    <input type="date" placeholder="fecha" name="fecha" id="fecha" value="{{ $i->fecha_cita }}">
                </div>

                <div class="form-row col-12">
                    @error('doctor')
                        <small>*{{ $message }}</small>
                    @enderror
                    <select name="doctor" id="doctor">
                        <option value="">seleccionar...</option>
                        @foreach ($sql3 as $item)
                            <option {{ $item->id_doctor == $i->id_doctor ? 'selected' : '' }} value="{{ $item->id_doctor }}">{{ $item->ape_nom }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="modal-footer">
                    <a href="{{ route('citas.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
                    <button type="submit" id="boton" class="btn btn-primary">MODIFICAR</button>
                </div>
            </form>
        @endforeach
    </div>


@endsection
