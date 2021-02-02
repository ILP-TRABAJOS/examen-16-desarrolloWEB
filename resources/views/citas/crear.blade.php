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
    <h3 class="text-center" style="margin-bottom: 55px">REGISTRO DE NUEVO CITA</h3>
    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        <div class="form-row col-12">
            @error('paciente')
            <small>*{{ $message }}</small>
            @enderror
            <select name="paciente" id="paciente">
                <option value="">seleccionar cliente...</option>
                @foreach ($sql as $item)
                <option value="{{ $item->id_paciente }}">{{ $item->ape_nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row col-12">
            @error('fecha')
            <small>*{{ $message }}</small>
            @enderror
            <input type="date" placeholder="fecha" name="fecha" id="fecha" value="{{ old('fecha') }}">
        </div>

        <div class="form-row col-12">
            @error('doctor')
            <small>*{{ $message }}</small>
            @enderror
            <select name="doctor" id="doctor">
                <option value="">seleccionar doctor...</option>
                @foreach ($sql1 as $item)
                <option value="{{ $item->id_doctor }}">{{ $item->ape_nom }}</option>
                @endforeach
            </select>
        </div>

        
        @error('consulta')
        <small>*{{ $message }}</small>
        @enderror
        <div class="form-group">
            <select name="consulta" id="consulta">
                <option value="">Seleccionar consulta...</option>
                @foreach ($consulta as $item)
                <option value="{{$item->id_consulta}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
        </div>
        @error('precio')
        <small>*{{ $message }}</small>
        @enderror
        <div class="form-group">
            <input type="text" name="precio" id="precio" placeholder="Ingrese el precio">
        </div>
        @error('total')
        <small>*{{ $message }}</small>
        @enderror
        <div class="form-group">
            <input type="text" name="total" id="total" placeholder="Ingrese el precio total">
        </div>



        <div class="modal-footer">
            <a href="{{ route('citas.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
            <button type="submit" id="boton" class="btn btn-primary">REGISTRAR</button>
        </div>
    </form>

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