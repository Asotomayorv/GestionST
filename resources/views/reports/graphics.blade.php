@extends('layout.fluidNavbar')
@section('graphics')
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Llamadas'],
          <?php
            use Illuminate\Support\Facades\DB;
            //$conexion = env('DB_DATABASE');
            //$SQL = "SELECT monthname(dateCreation) AS mes, COUNT(*) AS cantidad FROM incomingCalls GROUP BY mes;";
            //$consulta = mysqli_query($conexion, $SQL);
            $results = DB::select('SELECT monthname(dateCreation) AS mes, COUNT(*) AS cantidad FROM incomingCalls GROUP BY mes;');
            foreach ($results as $result) {
                $mes = $result->mes;
                $cantidad = $result->cantidad;
                echo "['" . $mes . "', " . $cantidad . "],";
            }
            // while ($resultado = mysqli_fetch_assoc($consulta)){
            //     echo "data.addRows(['".$resultado["mes"]."', ".$resultado["llamada"].",]);";
            // }
        ?>
        ]);
        
        var options = {
          hAxis: {title: 'Mes',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Facturas', 'Cantidad'],
            <?php
            //$conexion = env('DB_DATABASE');
            //$SQL = "SELECT monthname(dateCreation) AS mes, COUNT(*) AS cantidad FROM incomingCalls GROUP BY mes;";
            //$consulta = mysqli_query($conexion, $SQL);
            $results = DB::select('SELECT monthname(dateCreation) AS mes, COUNT(*) AS cantidad FROM billingOrders GROUP BY mes;');
            foreach ($results as $result) {
                $mes = $result->mes;
                $cantidad = $result->cantidad;
                echo "['" . $mes . "', " . $cantidad . "],";
            }
            // while ($resultado = mysqli_fetch_assoc($consulta)){
            //     echo "data.addRows(['".$resultado["mes"]."', ".$resultado["llamada"].",]);";
            // }
        ?>
        ]);

        var options = {
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Reportes</li>
                </ol>
            </nav>
            <h1 class="m-0">Visualización gráfica de reportes</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Inicio</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">Cantidad de Llamadas por Mes</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div id="chart_div" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">Cantidad de Boletas por Mes</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body" style="display: flex;align-items: center;justify-content: center;">
            <div id="donutchart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
</div>
@endsection