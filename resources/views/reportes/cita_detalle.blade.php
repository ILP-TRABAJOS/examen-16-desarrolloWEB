<style>
    h3{
        text-align: center;
        font-size: 30px
    }
    thead{
        background: rgb(11, 56, 82);        
        color: white;
    }
    th{
        padding: 10px;
    }
    tbody tr:nth-child(even){
        background: rgb(232, 250, 255);
        color: rgb(15, 24, 39);   
        text-align: center;
    }
    tbody tr:nth-child(odd){
        background: rgb(212, 230, 235);
        color: rgb(15, 24, 39);   
        text-align: center;
    }
</style>
<div class="col-lg-12"> 
    <h3 class="text-center">LISTA DE CITAS</h3>    
    <table class="table table-bordered table-responsive table-hover" id="example" width="100%">
        <thead class="bg-primary">
            <tr>
                <th>
                    ID
                </th>
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
                    PRECIO
                </th>
                <th>
                    TOTAL
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($sql as $i)
                <tr>
                    <td>{{ $i->id_cita_detalle }}</td>
                    <td>{{ $i->paciente}}</td>
                    <td>{{ $i->fecha_cita }}</td>
                    <td>{{ $i->ape_nom }}</td>
                    <td>{{ $i->descripcion }}</td>
                    <td>{{ $i->precio }}</td>
                    <td>{{ $i->total }}</td>                    

                </tr>
            @endforeach
        </tbody>
    </table>
</div>