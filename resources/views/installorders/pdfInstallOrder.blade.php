<!doctype html>
<html lang="en">
<head>
  <title>Boleta de Instalación</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Importar el framework Bootstrap 5 */
        @import "~bootstrap/dist/css/bootstrap.min.css";
        /* Estilos personalizados */

        body {
        font-family: sans-serif;
        font-size: 14px;
        }

        .container {
        width: 800px;
        margin: 0 auto;
        }

        .card {
        margin-bottom: 20px;
        }

        .card-header {
        border-bottom: 1px solid #ddd;
        }

        .card-body {
        padding: 20px;
        }

        .table {
        width: 100%;
        border-collapse: collapse;
        }

        .table th,
        .table td {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .table th {
        font-weight: bold;
        }

        .table td.text-center {
        text-align: center;
        }

        .table td.text-right {
        text-align: right;
        }

        /* Estilos específicos para la boleta */

        .install-info {
        background: #FFF;
        border-radius: 10px;
        }

        .install-details {
        padding: 15px;
        font-size: 0.9em;
        text-align: center;
        color: #999;
        }
     </style>
</head>
<body> 
    <div class="card-header">
        <p>
            Sistemas de Tiempo S.A
            <br>
            La Uruca, frente la agencia de autos Honda, 
            <br>
            contiguo a DHL, San José, Costa Rica
            <br>
            Tel. (506)2248-3636 | Fax. (506)2257-6037
            <br>
            www.sistemasdetiempo.com
        </p>
    </div>
    <div class="card-body">
        <div class="text-center">
            <h1>Orden de Servicio por Instalación</h1>
        </div>
        <div class="text-center">
            <h2>{{$installOrder -> routes -> customers -> customerFullName}}</h2>
        </div>
        <div class="install-info">
            <p>
                <strong>Cédula</strong>: {{$installOrder -> routes -> customers -> customerID}}
                <br>
                <strong>Contacto</strong>: {{$installOrder -> routes -> customers -> customerContact}}
                <br>
                <strong>Correo Electrónico 1</strong>: {{$installOrder -> routes -> customers -> customerEmail1}}
                <br>
                <strong>Correo Electrónico 2</strong>: {{empty($installOrder -> routes -> customers -> customerEmail2) ? 'N/A' : $billingOrders -> customers -> customerEmail2}}
                <br>
                <strong>Telefono 1</strong>: {{$installOrder -> routes -> customers -> customerPhone1}}
                <br>
                <strong>Telefono 2</strong>: {{empty($installOrder -> routes -> customers -> customerPhone2) ? 'N/A' : $billingOrders -> customers -> customerPhone2}}
                <br>
            </p>
            <p>
                <strong>Dirección de la Instalación</strong>: {{$installOrder -> routes -> routeAddress}}
                <br>
                <strong>No.Orden de Instalación</strong>: {{$installOrder -> idinstallation}}
                <br>
                <strong>Técnico(a) Asignado</strong>: {{$installOrder -> routes -> routeTechnicianAssigned}}
                <br>
                <strong>Prioridad</strong>: {{$installOrder -> routes -> routePriority}}
                <br>
                <strong>Fecha de Instalación</strong>: {{$installOrder -> routes -> startDate}}
                <br>
                <strong>Hora de Inicio</strong>: {{$installOrder -> routes -> startTime}}
                <br>
                <strong>Horas de Traslado</strong>: {{$installOrder -> installationTravelHours}}
                <br>
                <strong>Horas Estimadas de Trabajo</strong>: {{$installOrder -> installationEstimateHours}}
                <br>
                <strong>Total de Horas</strong>: {{$installOrder -> installationTotalHours}}
                <br>
                <strong>Observaciones</strong>: {{$installOrder -> installationComments}}
            </p>
        </div>
        <label><strong>Detalles de Instalación</strong></label><br>
        @php
            $details = [
                'Instalación de Reloj Marcador',
                'Capacitación de uso del Reloj',
                'Instalación de Software',
                'Capacitación de Software',
                'Evacuación de Dudas',
            ];
            $selectedDetails = explode(', ', $installOrder -> installationDetails);
        @endphp
        @foreach ($details as $index => $detail)
            <div class="form-check-inline">
                <input type="checkbox" id="installDetail{{ $index + 1 }}" value="{{ $detail }}" {{ in_array($detail, $selectedDetails) ? 'checked' : '' }}>
                <label for="installDetail{{ $index + 1 }}">{{ $detail }}</label>
            </div>
        @endforeach
        <h4>Productos a Instalar</h4>
        <table id="selectedProductTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">#Código</th>
                    <th class="text-center">
                        <span>Producto<span>
                    </th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">
                        <span>Categoría<span>
                    </th>
                    <th class="text-center">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($selectedProducts as $selectedProduct)
                <tr>
                    <td class="text-center">{{$selectedProduct -> products -> productCode}}</td>
                    <td class="text-center">{{$selectedProduct -> products -> productName}}</td>
                    <td class="text-center">{{$selectedProduct -> products -> brands -> brandName}}</td>
                    <td class="text-center">{{$selectedProduct -> products -> models -> modelName}}</td>
                    <td class="text-center">{{$selectedProduct -> products -> productSeries}}</td>
                    <td class="text-center">{{$selectedProduct -> products -> productCategory}}</td>
                    <td class="text-center">{{$selectedProduct -> productQuantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  <footer>
    <p>Su mejor alternativa en Relojes Marcadores</p>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
  <script src="{{asset('HTML/dist/assets/js/viewBillingOrder.js')}}"></script> 
</body>
</html>

<!--

                        <label for="province">Provincia*</label>
                        <select id="province" name="province" class="custom-select" data-id="{{$installOrder -> routes -> idProvince}}" disabled>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="canton">Cantón*</label>
                        <select id="canton" name="canton" class="custom-select" data-id="{{$installOrder -> routes -> idCanton}}" disabled>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="district">Distrito*</label><br>
                        <select id="district" name="district" class="custom-select" data-id="{{$installOrder -> routes -> idDistrict}}" disabled>
                        </select>
                    </div>
                </div>
            </div>
 <script src="{{asset('HTML/dist/assets/js/viewInstallOrder.js')}}"></script> 

 -->