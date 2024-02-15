<!doctype html>
<html lang="en">
<head>
  <title>Boleta de Facturación</title>
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

        .invoice-info {
        background: #FFF;
        border-radius: 10px;
        }

        .invoice-details {
        padding: 15px;
        font-size: 0.9em;
        text-align: center;
        color: #999;
        }

        .billing-order {
        background-color: #ffffff;
        }

        .billing-order-header {
        text-align: center;
        }

        .billing-order-number {
        font-size: 18px;
        font-weight: bold;
        }

        .billing-order-date {
        font-size: 16px;
        }

        .billing-order-customer {
        margin-bottom: 20px;
        }

        .billing-order-customer-name {
        font-size: 16px;
        font-weight: bold;
        }

        .billing-order-customer-address {
        font-size: 14px;
        }

        .billing-order-products {
        margin-top: 20px;
        }

        .billing-order-product-row {
        border-bottom: 1px solid #ddd;
        }

        .billing-order-product-code {
        width: 100px;
        }

        .billing-order-product-name {
        width: 200px;
        }

        .billing-order-product-quantity {
        width: 100px;
        }

        .billing-order-product-price {
        width: 100px;
        }

        .billing-order-totals {
        margin-top: 20px;
        }

        .billing-order-total-amount {
        font-size: 16px;
        font-weight: bold;
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
            <h1>Detalle de Venta/Contización</h1>
        </div>
        <div class="text-center">
            <h2>{{$billingOrders -> customers -> customerFullName}}</h2>
        </div>
        <div class="invoice-info">
            <p>
                <strong>Cédula</strong>: {{$billingOrders -> customers -> customerID}}
                <br>
                <strong>Contacto</strong>: {{$billingOrders -> customers -> customerContact}}
                <br>
                <strong>Correo Electrónico 1</strong>: {{$billingOrders -> customers -> customerEmail1}}
                <br>
                <strong>Correo Electrónico 2</strong>: {{empty($billingOrders -> customers -> customerEmail2) ? 'N/A' : $billingOrders -> customers -> customerEmail2}}
                <br>
                <strong>Telefono 1</strong>: {{$billingOrders -> customers -> customerPhone1}}
                <br>
                <strong>Telefono 2</strong>: {{empty($billingOrders -> customers -> customerPhone2) ? 'N/A' : $billingOrders -> customers -> customerPhone2}}
                <br>
                <strong>Direccion 1</strong>: {{$billingOrders -> customers -> customerAddress1}}
                <br>
            </p>
        </div>
        <div class="invoice-info">
            <p>
                <strong>No.Orden de Facturación</strong>: {{$billingOrders -> invoiceNumber}}
                <br>
                <strong>Vendedor(a)</strong>: {{$billingOrders -> seller}}
                <br>
                <strong>Método de pago</strong>: {{$billingOrders -> paymentMethod}}
                <br>
                <strong>Fecha de Entrega</strong>: {{$billingOrders -> deliveryDate}}
                <br>
                <strong>Total a Facturar</strong>: {{$billingOrders -> totalBilling}}
                <br>
                <strong>Precio general</strong>: {{$billingOrders -> totalPrice}}
                <br>
                <strong>Impuestos I.V.A</strong>: {{$billingOrders -> taxes}}
                <br>
                <strong>Comentarios</strong>: {{$billingOrders -> saleComments}}
            </p>
        </div>
        <h4>Productos Seleccionados</h4>
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
                    <th class="text-center">¿Requiere Instalación?</th>
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
                    <td class="text-center">
                        @if($selectedProduct -> installationRequired)
                            Si
                        @else
                            No
                        @endif
                    </td>
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