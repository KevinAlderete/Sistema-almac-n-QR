<style>
  body {
  font-size: 16px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table tr td {
  padding: 0;
}

table tr td:last-child {
  text-align: right;
}

.bold {
  font-weight: bold;
}

.right {
  text-align: right;
}

.large {
  font-size: 1.75em;
}

.total {
  font-weight: bold;
  color: #fb7578;
}

.logo-container {
  margin: 20px 0 20px 0;
}

.invoice-info-container {
  font-size: 0.875em;
}
.invoice-info-container td {
  padding: 4px 0;
}

.client-name {
  font-size: 1.5em;
  vertical-align: top;
}

.line-items-container {
  margin: 70px 0;
  font-size: 0.875em;
}

.line-items-container th {
  text-align: left;
  color: #999;
  border-bottom: 2px solid #ddd;
  padding: 10px 0 15px 0;
  font-size: 0.75em;
  text-transform: uppercase;
}

.line-items-container th:last-child {
  text-align: right;
}

.line-items-container td {
  padding: 15px 0;
}

.line-items-container tbody tr:first-child td {
  padding-top: 25px;
}

.line-items-container.has-bottom-border tbody tr:last-child td {
  padding-bottom: 25px;
  border-bottom: 2px solid #ddd;
}

.line-items-container.has-bottom-border {
  margin-bottom: 0;
}

.line-items-container th.heading-quantity {
  width: 50px;
}
.line-items-container th.heading-price {
  text-align: right;
  width: 100px;
}
.line-items-container th.heading-subtotal {
  width: 100px;
}

.payment-info {
  width: 38%;
  font-size: 0.75em;
  line-height: 1.5;
}

.footer {
  margin-top: 100px;
}

.footer-thanks {
  font-size: 1.125em;
}

.footer-thanks img {
  display: inline-block;
  position: relative;
  top: 1px;
  width: 16px;
  margin-right: 4px;
}

.footer-info {
  float: right;
  margin-top: 5px;
  font-size: 0.75em;
  color: #ccc;
}

.footer-info span {
  padding: 0 5px;
  color: black;
}

.footer-info span:last-child {
  padding-right: 0;
}

.page-container {
  display: none;
}
.footer {
  margin-top: 30px;
}

.footer-info {
  float: none;
  position: running(footer);
  margin-top: -25px;
}

.page-container {
  display: block;
  position: running(pageContainer);
  margin-top: -25px;
  font-size: 12px;
  text-align: right;
  color: #999;
}

.page-container .page::after {
  content: counter(page);
}

.page-container .pages::after {
  content: counter(pages);
}


@page {
  @bottom-right {
    content: element(pageContainer);
  }
  @bottom-left {
    content: element(footer);
  }
}
</style>

<div class="page-container">
  pagina
  <span class="page"></span>
  de
  <span class="pages"></span>
</div>

<div class="logo-container">
  <img
    style="height: 70px"
    src="{{ asset('/img/logo.jpg') }}"
  >
</div>

<table class="invoice-info-container">
  <tr>
    <td rowspan="2" class="client-name">
      {{$venta->nombre}}
    </td>
    <td>
      TIENDAS CELL Y MÁS 
    </td>
  </tr>
  <tr>
    <td>
      Jr. San Cristóbal N° 324 CHAUMPIMARCA 
    </td>
  </tr>
  <tr>
    <td>
      DNI: <strong>{{$venta->dni}}</strong>
    </td>
    <td>
      PASCO
    </td>
  </tr>
  <tr>
    <td>
      N° Boleta: <strong>{{ $venta->n_boleta }}</strong>
    </td>
    <td>
      tiendascellymas@gmail.com
    </td>
  </tr>
</table>


<table class="line-items-container">
  <thead>
    <tr>
      <th class="heading-quantity">Catidad</th>
      <th class="heading-quantity">Marca</th>
      <th class="heading-quantity">Modelo</th>
      <th class="heading-quantity">Color</th>
      <th class="heading-quantity">IMEI</th>
      <th class="heading-quantity">Numero</th>
      <th class="heading-subtotal">Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $venta->cantidad}}</td>
      @foreach ($categorias as $categoria)
      @if ($venta->id_categoria == $categoria->id)
        <td>{{ $categoria->marca }}</td>
        <td>{{ $categoria->modelo }}</td>
      @endif
      @endforeach 
        
      @foreach ($articulos as $articulo)
      @if ($venta->id_articulo == $articulo->id)
        <td>{{ $articulo->color}}</td>
        <td>{{ $articulo->imei}}</td>
      @endif
      @endforeach
      <td>{{ $venta->numero}}</td>
      

      <td class="bold">{{$venta->precio}}</td>
    </tr>
  </tbody>
</table>


<table class="line-items-container has-bottom-border">
  <thead>
    <tr>
      <th></th>
      <th></th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="payment-info">
        <div>
          <strong></strong>
        </div>
        <div>
          <strong></strong>
        </div>
      </td>
      <td class="large"></td>
      <td class="large total">S/. {{$venta->precio}}</td>
    </tr>
  </tbody>
</table>

<div class="footer">
  <div class="footer-info">
    <span>tiendascellymas@gmail.com</span> |
    <span>999 999 999</span> 
  </div>
  <div class="footer-thanks">
    <span>Gracias!</span>
  </div>
</div>
