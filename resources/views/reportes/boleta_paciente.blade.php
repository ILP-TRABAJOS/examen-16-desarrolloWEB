<style>
    body {
        background: #EEE;
        font-family: sans-serif;
        font-size: 20px;
        margin: 3em;
        padding: 0;
    }

    #register {
        width: 20em;
        margin: auto;
    }

    #ticket {
        background: white;
        margin: 0 1em;
        padding: 1em;
        box-shadow: 0 0 5px rgba(0, 0, 0, .25);
    }

    #ticket h1 {
        text-align: center;
    }

    #ticket table {
        font-family: monospace;
        width: 100%;
        border-collapse: collapse;
    }

    #ticket td,
    #ticket th {
        padding: 5px;
    }

    #ticket th {
        text-align: left;
    }

    #ticket td,
    #ticket #total {
        text-align: right;
    }

    #ticket tfoot th {
        border-top: 1px solid black;
    }

    #entry {
        background: #333;
        padding: 12px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, .25);
    }

    #entry input {
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        text-align: right;
        font-family: sans-serif;
        font-size: 20px;
        box-shadow: inset 0 0 3px rgba(0, 0, 0, .5);
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    #entry input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, .75);
    }
</style>


@foreach ($sql as $item)

<br><br><br>
<br>
<br>
<br>
<br>
<div id="register">
    <div id="ticket">
        <h1>GRACIAS</h1>
        <h6 style="text-align: center">{{$item->paciente}}</h6>
        <table>

            <tbody id="entries">

            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th id="total">S/. {{$item->total}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <form id="entry">
        <input id="newEntry" autofocus placeholder="How Much?">
    </form>
</div>

@endforeach