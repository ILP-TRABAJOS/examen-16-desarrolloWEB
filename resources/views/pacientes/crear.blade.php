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
    <h3 class="text-center" style="margin-bottom: 55px">REGISTRO DE NUEVO PACIENTE</h3>
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf


        <div class="form-row col-12">
            @error('dni')
            <small>*{{ $message }}</small>
            @enderror
            <input type="text" placeholder="Dni" name="dni" id="dni" value="{{ old('dni') }}">
        </div>

        <div class="form-row col-12">
            @error('nombre')
            <small>*{{ $message }}</small>
            @enderror
            <input type="text" placeholder="Nombre del paciente" name="nombre" id="nombre" value="{{ old('nombre') }}">
        </div>

        <div class="form-row col-12">
            @error('celular')
            <small>*{{ $message }}</small>
            @enderror
            <input type="text" placeholder="Celular" name="celular" id="celular" value="{{ old('celular') }}">
        </div>



        <div class="modal-footer">
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary" data-dismiss="modal">ATRAS</a>
            <button type="submit" id="boton" class="btn btn-primary">REGISTRAR</button>
        </div>
    </form>

    <script>
        var boton = document.getElementById("dni");

function traer() {
    var dni = document.getElementById("dni").value;
    fetch('https://dni.optimizeperu.com/api/persons/' + dni).then(res => res.json()).then(data => {
        //document.getElementById("doc").value = (data.dni);
        document.getElementById("nombre").value = (data.name +" "+data.first_name + " " + data.last_name);
        //document.getElementById("apellido").value = (data.first_name + " " + data.last_name);
        //document.getElementById("cui").value = (data.cui);
    });
}
boton.addEventListener('change', traer);
    </script>
</div>
@endsection