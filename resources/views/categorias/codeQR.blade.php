<style>
  @page {
    size: 340px 300px;
  }
  * {
    box-sizing: border-box;
    margin: none;
  }
  .card-container {
    color: #b3b8cd;
    padding: 20px 0 0 0;
    position: relative;
    width: 350px;
    text-align: center;
  }
  

</style>

<div class="card-container">
  <img class="round" src="data:image/png;base64, {!! base64_encode(QrCode::style('round')->eye('circle')->size(250)->generate($categoria->uuid)) !!} ">          

</div>
