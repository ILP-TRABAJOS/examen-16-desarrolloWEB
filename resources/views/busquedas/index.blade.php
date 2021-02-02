@extends('layouts/app')
{{-- @section('titulo', 'Lista Cursos') --}}
@section('content')


<div class="col-lg-12">
    <h3 class="text-center">REALIZAR BUSQUEDAS</h3>
    <div>
        <h5 class="text-black">BUSQUEDAS POR CONSULTAS</h5>
        <select name="consulta" id="consulta">
            <option value="">seleccionar consulta...</option>
            @foreach ($sql2 as $item)
            <option value="{{$item->id_consulta}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
        <thead class="bg-primary">
            <tr>
                <th>
                    PACIENTE
                </th>
                <th>
                    FECHA
                </th>
                <th>
                    DOCTOR
                </th>
                <th>
                    CONSULTA
                </th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div>
        <h5 class="text-black">BUSQUEDAS POR PACIENTES</h5>
        <input type="text" class="form-control" list="paciente" id="pac" name="paciente"
            placeholder="Ingrese el nombre del paciente">
        <datalist id="paciente">
            @foreach ($sql4 as $item)
            <option value="{{$item->ape_nom}}">{{$item->ape_nom}}</option>
            @endforeach
        </datalist>
    </div>
    <br>
    <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
        <thead class="bg-primary">
            <tr>
                <th>
                    PACIENTE
                </th>
                <th>
                    FECHA
                </th>
                <th>
                    DOCTOR
                </th>
                <th>
                    CONSULTA
                </th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
</div>



<script>
    function buscar() {
                let valor=document.getElementById("consulta").value;
               
                var ruta = "{{ url('busqueda-por-lista/') }}/" + valor + "";
                //var ruta = "{{ route('busqueda.busqueda',['valor']) }}";
                $.ajax({
                    url: ruta,
                    type: "get",
                    success: function(data) {
                        if (data.dato=="") {
                            $("#prom").html(data.error);
                            let tbody=document.querySelector("tbody");
                            tbody.innerHTML=""
                        }else{
                            let tr=document.createElement("tr");
                            let tbody=document.querySelector("tbody");
                            let fragmento=document.createDocumentFragment();
                            let td="";
                            data.dato.forEach(function(item,index){
                                td+=`<tr><td>${item.paciente}</td><td>${item.fecha_cita}</td><td>${item.ape_nom}</td><td>${item.descripcion}</td></tr>`;
                                //tr.innerHTML=td;
                                tbody.innerHTML=td
                                console.log(item)
                            })
                        }
                    },
                    error: function(data) {
                        $("#prom").html(data.error);
                        let tbody=document.querySelector("tbody");
                        //let tr=document.querySelector("tr");
                        tbody.innerHTML=""
                        // if ($.isEmptyObject(errors) == false) {
                        //     $.each(errors.errors, function(key, value) {
                        //         var errorId = '#' + key + 'Error';
                        //         $(errorId).removeClass("d-none");
                        //         $(errorId).text(value);
                        //     })
                        // }
                    }
                })
            }

</script>

<script>
    let desc=document.getElementById("consulta");
    desc.addEventListener("change",buscar)
    console.log(desc.value)
</script>


<script>
    let paciente=document.getElementById("pac");
    paciente.addEventListener("keyup",buscarPaciente)
    
    function buscarPaciente(){
        let valor=document.getElementById("pac").value;
               
               var ruta = "{{ url('busqueda-por-paciente/') }}/" + valor + "";
               //var ruta = "{{ route('busqueda.busqueda',['valor']) }}";
               $.ajax({
                   url: ruta,
                   type: "get",
                   success: function(data) {
                       if (data.dato=="") {
                           $("#prom").html(data.error);
                           let tbody=document.getElementById("tbody");
                           tbody.innerHTML=""
                       }else{
                           let tr=document.createElement("tr");
                           let tbody=document.getElementById("tbody");
                           let fragmento=document.createDocumentFragment();
                           let td="";
                           data.dato.forEach(function(item,index){
                               td+=`<tr><td>${item.paciente}</td><td>${item.fecha_cita}</td><td>${item.ape_nom}</td><td>${item.descripcion}</td></tr>`;
                               //tr.innerHTML=td;
                               tbody.innerHTML=td
                               console.log(item)
                           })
                       }
                   },
                   error: function(data) {
                       $("#prom").html(data.error);
                       let tbody=document.getElementById("tbody");
                       //let tr=document.querySelector("tr");
                       tbody.innerHTML=""
                       // if ($.isEmptyObject(errors) == false) {
                       //     $.each(errors.errors, function(key, value) {
                       //         var errorId = '#' + key + 'Error';
                       //         $(errorId).removeClass("d-none");
                       //         $(errorId).text(value);
                       //     })
                       // }
                   }
               })
           }
</script>
@endsection