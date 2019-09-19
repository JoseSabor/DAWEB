<?php
$servername="pepito";
$username="alicia";
$password="conejo";
$dbname="qeq";

$conn = new mysqli( $servername, $username, $password, $dbname);
if ($conn->connect_error) 
	die("Fallo de conexi&oacute;n: ".$conn->connect_error);
else 
	echo 	"Usuario ".$username
		." conectado a la base de datos ".$dbname
		." del servidor ".$servername."<br>";

$sql="select * from personajes";
$sexo=$_POST["sexo"];
if ($sexo) $sql=$sql." where sexo='".$sexo."'";
echo "Consulta SQL: ".$sql."<br>";

$result=$conn->query($sql);
echo $result->num_rows." filas<br>";

if ($result->num_rows > 0) {
	echo "<table><tr>";
	$fieldinfo=mysqli_fetch_fields($result);
	foreach ($fieldinfo as $val)
		echo "<th>{$val->name}</th>";

	echo "</tr>";

	$n=$result->field_count;
	while ($row = $result->fetch_array(MYSQLI_NUM)) {
		echo "<tr>";
		for ($i=0; $i < $n; $i++)
			echo "<td>".$row[$i]."</td>";
		echo "</tr>";
	}
	echo "</table>";
} else 
	echo "0 filas de resultado";

$conn->close();
?>
