<?php
    $url = 'http://localhost/DSS_API-main/Laravel_API/public/api/clientes';
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response=curl_exec($client);
    $result = json_decode($response);
    //var_dump($result);
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<br>
<br>
    <div class="container">
        <h1 class="text-center">Crear usuario</h1>        
        <br>
        <form action='conte.php' method='POST'>
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" name="Nombre">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Apellido</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellido" name="Apellido">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Edad</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Edad" name="Edad">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Salario</label>
                <input type="txt" class="form-control" id="exampleInputPassword1" placeholder="Salario" name="Salario">
              </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        <div>
        <br>
            <div class="">
                <table class="table table-striped table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Salario</th>
                           <th></th>
                           <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($result as $row){
                            echo '
                                <tr>
                                <th>'.$row->id.'</th>
                                <th>'.$row->nombre.'</th>
                                <th>'.$row->apellido.'</th>
                                <th>'.$row->edad.'</th>
                                 <th>'.$row->salario.'</th>
                                <th><a href="./conte.php?accion=eliminar&id='.$row->id.'" class="btn btn-danger">Eliminar</a></th>
                                <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'">
                                editar
                              </button>
                              </button></th>
                            </tr>';
                        
                        ?>
<!-- Modal -->

<div class="modal fade" id="exampleModal<?php echo $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="" >
       <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" name="Nombre" value='<?php echo $row->nombre?>'>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Apellido</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellido" name="Apellido" value='<?php echo $row->apellido?>'>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Edad</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Edad" name="Edad" value='<?php echo $row->edad?>'>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Salario</label>
                <input type="txt" class="form-control" id="exampleInputPassword1" placeholder="Salario" name="Salario" value='<?php echo $row->salario?>'>
              </div>
              <input type='hidden' name='id' value='<?php echo $row->id ?>'>
              <input type='hidden' name='accion' value='editar'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>  
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
  </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
if(!empty($_GET)){
    if($_GET['accion']=='eliminar'){
        $urlDelete = 'http://localhost/DSS_API-main/Laravel_API/public/api/clientes/'.$_GET['id'];
        $clientDelete = curl_init($urlDelete);
        curl_setopt($clientDelete,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($clientDelete,CURLOPT_CUSTOMREQUEST,"DELETE");
        $response = curl_exec($clientDelete);
        if($response==1){
          echo "<script>alert('registro eliminado exitosamente');document.location='conte.php'</script>";
          }else{
          echo "<script>alert('No se pudo eliminar el registro');document.location='conte.php'</script>";
          }

    }elseif($_GET['accion']=='editar'){
        $urlUpdate= 'http://localhost/DSS_API-main/Laravel_API/public/api/clientes/'.$_GET['id'];
        $clientUpdate = curl_init($urlUpdate);
        curl_setopt($clientUpdate,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($clientUpdate,CURLOPT_CUSTOMREQUEST,"PUT");
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );
        curl_setopt($clientUpdate, CURLOPT_HTTPHEADER, $headers);
        $Nombre=$_GET['Nombre'];
        $Apellido=$_GET['Apellido'];
        $Edad=$_GET['Edad'];
        $Salario=$_GET['Salario'];
        $data = <<<DATA
        {
        "nombre":"$Nombre",
        "apellido":"$Apellido",
        "edad":"$Edad",
        "salario":"$Salario"
        }
DATA;
        curl_setopt($clientUpdate, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($clientUpdate);
        if($response==1){
            echo "<script>alert('registro editado exitosamente');document.location='conte.php'</script>";
            }else{
            echo "<script>alert('No se pudo editado el registro');document.location='conte.php'</script>";
            }
    }
}
if(!empty($_POST)){
echo 'culero';
$urlInsert = "http://localhost/DSS_API-main/Laravel_API/public/api/clientes";
$clientInsert = curl_init($urlInsert);
curl_setopt($clientInsert, CURLOPT_URL, $urlInsert);
curl_setopt($clientInsert, CURLOPT_POST, true);
curl_setopt($clientInsert, CURLOPT_RETURNTRANSFER, true);
$headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
);
curl_setopt($clientInsert, CURLOPT_HTTPHEADER, $headers);
$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Edad=$_POST['Edad'];
$Salario=$_POST['Salario'];
$data = <<<DATA
{
"nombre":"$Nombre",
"apellido":"$Apellido",
"edad":"$Edad",
"salario":"$Salario"
}
DATA;
curl_setopt($clientInsert, CURLOPT_POSTFIELDS, $data);
$resp = curl_exec($clientInsert);
echo $resp;
curl_close($clientInsert);
if($resp==1){
    echo "<script>alert('registro agregado exitosamente');document.location='conte.php'</script>";
    }else{
    echo "<script>alert('No se pudo agregar el registro');document.location='conte.php'</script>";
    }
}
?>

</body>
</html>