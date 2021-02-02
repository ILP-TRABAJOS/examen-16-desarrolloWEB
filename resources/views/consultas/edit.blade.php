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

@foreach ($sql as $item)

<div class="modal-body" id="modal-edit">
    <h3 class="text-center" style="margin-bottom: 55px">MODIFICAR CONSULTA</h3>
    <form action="{{ route('consultas.update') }}" method="POST">
        @csrf
        <input type="text" name="id" hidden value="{{$item->id_consulta}}">
        <div class="form-row col-12">
            @error('desc')
            <small>*{{ $message }}</small>
            @enderror


            <input type="text" list="desc" value="{{ $item->descripcion }}" name="desc"
                placeholder="Ingrese una Descripcion...">
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
            <input class="form-control" type="number" value="{{old('precio',$item->precio)}}" name="precio" id="precio"
                placeholder="Ingrese el precio">
        </div>

        <div class="modal-footer">
            <a href="{{ route('consultas.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
            <button type="submit" id="boton" class="btn btn-primary">MODIFICAR</button>
        </div>
    </form>
</div>

@endforeach
@endsection