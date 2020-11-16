<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();

if(isset($_GET["tag"])){
    $tag=$_GET['tag'];

    $conexion=mysqli_connect($hostname,$username,$password,$database);

    $consulta="INSERT INTO tags(tags_id) VALUES ('{$tag}')";
    $resultado=mysqli_query($conexion,$consulta);

    if($consulta){

        $consulta="SELECT * FROM tags WHERE tags_id = '{$tag}'";
        $resultado=mysqli_query($conexion,$consulta);

        if($reg=mysqli_fetch_array($resultado)){
            $json['tags'][]=$reg;
        }

    mysqli_close($conexion);
    echo json_encode($json);
    }
    else{
        $results["tag"]='';
        $json['tags'][]=$results;
        echo json_encode($json);
    }
}
else{
    $results["tag"]='';
    $json['tags'][]=$results;
    echo json_encode($json);
}
?>