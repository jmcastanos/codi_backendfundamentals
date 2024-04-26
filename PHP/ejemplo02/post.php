
Hola, creo que buscas: 
<br>
<?php

$busqueda =  ($_POST['quebuscas']);
//$busqueda = filter_input(INPUT_POST, 'quebuscas', FILTER_SANITIZE_SPECIAL_CHARS);
//$busqueda = filter_var($busqueda, FILTER_SANITIZE_SPECIAL_CHARS);



//conectar a la BD
$conn = new mysqli("viewbug", "codi", "codicodi", "codi");

//validar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//buscamos en la BD
$sql = "SELECT * FROM users WHERE username='?'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $busqueda);

$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
}

echo $sql;


//mostramos los resultados