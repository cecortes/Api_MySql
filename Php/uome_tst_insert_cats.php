<?PHP
$hostname="localhost";
$database="uome";
$username="root";
$password="sylka1234";

$json=array();
$id="tstPHP";
$desc="Prueba desde PHP";
$taga="tsta";
$tagb="tstb";
$tagc="tstc";
$notes="notes";

$conexion=mysqli_connect($hostname,$username,$password,$database);
		
$consulta="INSERT INTO cats(cats_id, cats_desc, cats_taga, cats_tagb, cats_tagc, cats_notes) VALUES ('{$id}','{$desc}','{$taga}','{$tagb}','{$tagc}','{$notes}')";
$resultado=mysqli_query($conexion,$consulta);

echo("Insert");
?>