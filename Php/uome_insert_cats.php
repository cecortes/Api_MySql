<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();

if(isset($_GET["id"]) && ($_GET["desc"]) && ($_GET["taga"]) && ($_GET["tagb"]) && ($_GET["tagc"]) && ($_GET["notes"])){
    $id=$_GET['id'];
    $desc=$_GET['desc'];
    $taga=$_GET['taga'];
    $tagb=$_GET['tagb'];
    $tagc=$_GET['tagc'];
	$notes=$_GET['notes'];

    $conexion=mysqli_connect($hostname,$username,$password,$database);
		
    $consulta="INSERT INTO cats(cats_id, cats_desc, cats_taga, cats_tagb, cats_tagc, cats_notes) VALUES ('{$id}','{$desc}','{$taga}','{$tagb}','{$tagc}','{$notes}')";
    $resultado=mysqli_query($conexion,$consulta);

    if($consulta){

        $consulta="SELECT * FROM cats WHERE cats_id = '{$id}'";
        $resultado=mysqli_query($conexion,$consulta);

        if($reg=mysqli_fetch_array($resultado)){
            $json['cats'][]=$reg;
        }

    mysqli_close($conexion);
    echo json_encode($json);
    }

    else{
        $results["id"]='';
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
    $results["id"]='';
    $results["desc"]='';
    $results["taga"]='';
    $results["tagb"]='';
    $results["tagc"]='';
    $results["notes"]='';
    $json['cats'][]=$results;
    echo json_encode($json);
}
?>