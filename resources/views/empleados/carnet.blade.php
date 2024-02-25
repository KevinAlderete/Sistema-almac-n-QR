<style>
  @page {
    size: 350px 400px;
  }
  * {
    box-sizing: border-box;
    margin: none;
  }
  h3 {
      margin: 10px 0;
  }

  h6 {
      margin: 5px 0;
      text-transform: uppercase;
  }

  p {
      font-size: 14px;
      line-height: 21px;
  }
  .card-container {
    background-color: #231e39;
    border-radius: 5px;
    color: #b3b8cd;
    padding: 30px 0 30px 0;
    position: relative;
    width: 350px;
    text-align: center;
  }
  .card-container .round {
    border: 7px solid #fff;
    
  }
  
  .buttons {
    padding: 30px 0 0 0;
  }
  .card-container .pro {
    color: #231e39;
    background-color: #febb0b;
    border-radius: 3px;
    font-size: 14px;
    font-weight: bold;
    padding: 3px 7px;
    position: absolute;
    top: 30px;
    left: 30px;
  }

  button.primary {
    background-color: #03bfcb;
    border: 1px solid #03bfcb;
    border-radius: 3px;
    color: #231e39;
    font-family: Montserrat, sans-serif;
    font-weight: 500;
    padding: 10px 25px;
  }

  button.primary.ghost {
      background-color: transparent;
      color: #02899c;
  }

</style>

<div class="card-container">
  <span class="pro">AC</span>
  <img class="round" src="data:image/png;base64, {!! base64_encode(QrCode::style('round')->eye('circle')->size(150)->generate($empleado->uuid)) !!} ">          
  
  <h3>{{ $empleado->nombre }} {{ $empleado->apellidos }}</h3>
  <h6>{{ $empleado->cargo }}</h6>
  <p>
    {{ $empleado->email }}
  </p>
  <div class="buttons">
      <button class="primary">
          EMPRESA
      </button>
  </div>
</div>
