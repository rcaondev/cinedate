<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nomeFilme = $_POST['nomeFilme'];
  $data = $_POST['data'];
  $local = $_POST['local'];
  $foto = $_FILES['foto'];

  // Salvar a foto no servidor
  $fotoPath = 'uploads/' . basename($foto['name']);
  move_uploaded_file($foto['tmp_name'], $fotoPath);

  // Salvar informações no banco de dados
  $stmt = $conn->prepare("INSERT INTO filmes (nome, data, local, foto) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nomeFilme, $data, $local, $fotoPath);
  if ($stmt->execute()) {
    echo "Filme salvo com sucesso!";
  } else {
    echo "Erro ao salvar filme: " . $conn->error;
  }
}
?>
