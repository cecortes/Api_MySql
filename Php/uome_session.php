<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();

	if(isset($_GET["u"]) && isset($_GET["p"])){
		$user=$_GET['u'];
		$pwd=$_GET['p'];
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="SELECT * FROM usuarios WHERE user= '{$user}' AND pwd = '{$pwd}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){
		
			if($reg=mysqli_fetch_array($resultado)){
				$json['sesion'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
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