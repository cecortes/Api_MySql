<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();
//$tuser = "god";
//$tpass = "god1234";

if(isset($_GET["u"]) && isset($_GET["p"])){
    $user=$_GET['u'];
	$pwd=$_GET['p'];

    $conexion=mysqli_connect($hostname,$username,$password,$database);
		
    $consulta="SELECT * FROM usuarios WHERE usr_nom = '{$user}' AND usr_pass = '{$pwd}'";
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
}
else{
    $results["id"]='';
    $results["nombre"]='';
    $results["mail"]='';
    $results["pass"]='';
    $results["create"]='';
    $json['sesion'][]=$results;
    echo json_encode($json);
}
?>