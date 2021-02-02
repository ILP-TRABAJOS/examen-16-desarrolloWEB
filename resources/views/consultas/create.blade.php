@extends('layouts/app')
@section('titulo','Crear nueva consulta')
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


<div class="modal-body" id="modal-create">
    <h3 class="text-center" style="margin-bottom: 55px">REGISTRO DE NUEVA CONSULTA</h3>
    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        <div class="form-row col-12">
            @error('desc')
            <small>*{{ $message }}</small>
            @enderror
            <input type="text" list="desc" name="desc" placeholder="Tipo de consulta">
            <datalist id="desc">
                <option value="odontología"></option>
                <option value="medicina general"></option>
                <option value="ecográfica"></option>
                <option value="ginecología"></option>
                <option value="topico"></option>
                <option value="laboratorio"></option>
            </datalist>
        </div>
        <div class="form-group">
            @error('precio')
            <small>*{{ $message }}</small>
            @enderror
            <input class="form-control" type="number" name="precio" id="precio" placeholder="Ingrese el precio">
        </div>

        <div class="modal-footer">
            <a href="{{ route('consultas.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
            <button type="submit" id="boton" class="btn btn-primary">REGISTRAR</button>
        </div>
    </form>
</div>
@endsection