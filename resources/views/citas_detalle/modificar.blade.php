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
    <h3 class="text-center" style="margin-bottom: 35px">MODIFICAR DETALLE CITA</h3>
    <form action="{{ route('citas-detalle.update') }}" method="POST">
        <input type="hidden" name="id" value="{{ $i->id_cita_detalle }}">
        @csrf


        <select name="cita" id="cita">
            <option value="">seleccionar...</option>
            @foreach ($sql1 as $item)
            <option {{ $item->id_cita == $i->id_cita ? 'selected' : '' }} value="{{ $item->id_cita }}">
                {{ $item->id_cita }}
            </option>
            @endforeach
        </select>

        @error('consulta')
        <small>*{{ $message }}</small>
        @enderror
        <div class="form-group">
            <select name="consulta" id="consulta">
                <option value="">Seleccionar consulta...</option>
                @foreach ($sql2 as $item)
                <option {{ $i->id_consulta==$item->id_consulta ? "selected" : "" }} value="{{$item->id_consulta}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
        </div>
        @error('precio')
        <small>*{{ $message }}</small>
        @enderror
        <div class="form-group">
            <input type="text" name="precio" value="{{$i->precio}}" id="precio" placeholder="Ingrese el precio">
        </div>
        @error('total')
        <small>*{{ $message }}</small>
        @enderror
        <div class="form-group">
            <input type="text" name="total" value="{{$i->total}}" id="total" placeholder="Ingrese el precio total">
        </div>


        <div class="modal-footer">
            <a href="{{ route('citas-detalle.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
            <button type="submit" id="boton" class="btn btn-primary">MODIFICAR</button>
        </div>
    </form>
    @endforeach

    <script>
        let consulta=document.getElementById("consulta");
        consulta.addEventListener("change",verPrecio)
        function verPrecio(){
            var ruta = "{{ url('busqueda-consulta-cita-detalle/') }}/" + consulta.value + "";
            $.ajax({            
            url: ruta,
            type: "get",
            success: function(data) {
                let precio=document.getElementById("precio");                
                precio.value=data.dato;
            },
            error: function(data) {
                let precio=document.getElementById("precio");                
                precio.value=data.error;
            }
        })
        }
    </script>
</div>


@endsection