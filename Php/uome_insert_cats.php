<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();
//$tuser = "god";
//$tpass = "god1234";

if(isset(isset($_GET["desc"]) && isset($_GET["taga"]) && isset($_GET["tagb"]) && isset($_GET["tagc"]) && isset($_GET["notes"])){
    $desc=$_GET['desc'];
    $taga=$_GET['taga'];
    $tagb=$_GET['tagb'];
    $tagc=$_GET['tagc'];
	$notes=$_GET['notes'];

    $conexion=mysqli_connect($hostname,$username,$password,$database);
		
    $consulta="INSERT INTO cats(cats_desc, cats_taga, cats_tagb, cats_tagc, cats_notes) VALUES ('{$desc}','{$taga}','{$tagb}','{$tagc}','{$notes}')";
    $resultado=mysqli_query($conexion,$consulta);

    if($consulta){
		
        if($reg=mysqli_fetch_array($resultado)){
            $json['cats'][]=$reg;
        }

    mysqli_close($conexion);
    echo json_encode($json);
    }

    else{
        $results["desc"]='';
        $results["taga"]='';
        $results["tagb"]='';
        $results["tagc"]='';
        $results["notes"]='';
        $json['cats'][]=$results;
        echo json_encode($json);
    }
}
else{
    $results["desc"]='';
    $results["taga"]='';
    $results["tagb"]='';
    $results["tagc"]='';
    $results["notes"]='';
    $json['cats'][]=$results;
    echo json_encode($json);
}
?>