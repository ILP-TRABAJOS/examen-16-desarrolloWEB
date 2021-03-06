
    <style>
        .box {
            margin: 0px auto;
            margin-top: 80px;
            background: #FFF9EE url(https://subtlepatterns.com/patterns/lightpaperfibers.png);
            color: #333;
            text-transform: uppercase;
            padding: 8px;
            width: 550px;
            font-weight: bold;
            text-shadow: 0px 1px 0px #fff;
            font-family: "arvo";
            font-size: 11px;
            border-left: 1px dashed rgba(51, 51, 51, 0.5);
            -webkit-filter: drop-shadow(0 5px 18px #000);
        }

        .inner {
            border: 2px dashed rgba(51, 51, 51, 0.5);
            min-height: 100px;
            padding: 8px;

        }

        .inner h1 {
            padding: 5px 0px;
            margin: 0px;
            font-size: 18px;
            border-bottom: 1px solid rgba(51, 51, 51, 0.3);
            text-align: center;
        }

        .info {
            width: 100%;
            margin-top: 5px;
        }

        .info .wp {
            float: left;
            padding: 5px;
            width: 180px;
            text-align: center;
        }

        .info .wp h2 {
            margin: 8px;
        }

        .total {
            border-top: 1px solid rgba(51, 51, 51, 0.3);
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }



        
    </style>


    @foreach ($sql as $item)

    <div class="box">
        <div class='inner'>
            <h1>TICKETS de citas:</h1>
            <div class='info clearfix'>
                <div style="font-size: 16px" class='wp'>Paciente<h5>{{$item->paciente}}</h5>
                </div>
                <div style="font-size: 16px" class='wp'>Fecha<h5>{{$item->fecha_cita}}</h5>
                </div>
                <div style="font-size: 16px" class='wp'>Precio<h5>S/. {{$item->precio}}</h5>
                </div>
            </div>
            <div style="text-align: center">
                <h2>Total : <span>S/. {{$item->total}}</span>
                </h2>
            </div>
        </div>
    </div>
    @endforeach