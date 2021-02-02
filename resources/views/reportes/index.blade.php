@extends('layouts/app')
{{-- @section('titulo', 'Lista Cursos') --}}
@section('content')
<div>
    <h3 class="text-black text-center">REPORTES DE TICKETS</h3>
    <input type="number" class="form-control" list="paciente" id="pac" name="paciente"
        placeholder="Ingrese el DNI del paciente">

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
            <th>

            </th>
            <th>

            </th>
        </tr>
    </thead>
    <tbody id="tbody">

    </tbody>
</table>





<script>
    let paciente=document.getElementById("pac");
paciente.addEventListener("keyup",buscarPaciente)

function buscarPaciente(){
    let valor=document.getElementById("pac").value;
           
           var ruta = "{{ url('busqueda-por-paciente-dni/') }}/" + valor + "";
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
                           td+=`<tr><td>${item.paciente}</td><td>${item.fecha_cita}</td><td>${item.ape_nom}</td><td>${item.descripcion}</td><td><a target="_blank" href="ticket-paciente-pdf-${item.id_cita_detalle}" class="btn btn-success"><i
                class="fas fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;TICKET</a><td><a target="_blank" href="boleta-paciente-pdf-${item.id_cita_detalle}" class="btn btn-warning"><i
                class="fas fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;BOLETA</a></td></tr>`;
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