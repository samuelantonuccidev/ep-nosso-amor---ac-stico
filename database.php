<?php
$servername = "localhost:8080"; 
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "te_encontrar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    if (!empty($nome)) {
        $stmt = $conn->prepare("INSERT INTO buscas (nome) VALUES (?)");
        $stmt->bind_param("s", $nome);
        if ($stmt->execute()) {
            echo "sucesso";
        } else {
            echo "erro";
        }
        $stmt->close();
    }
}

$conn->close();
?>
