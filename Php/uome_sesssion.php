<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();

$conexion=mysqli_connect($hostname,$username,$password,$database);
		
$consulta="SELECT * FROM usuarios";
$resultado=mysqli_query($conexion,$consulta);

if($consulta){
		
    if($reg=mysqli_fetch_array($resultado)){
        $json['sesion'][]=$reg;
    }
    mysqli_close($conexion);
    echo json_encode($json);
}
else{
    $results["id"]='999';
    $results["nombre"]='NA';
    $results["mail"]='NA';
    $results["pass"]='NA';
    $results["create"]='NA';
    $json['sesion'][]=$results;
    echo json_encode($json);
}
?>