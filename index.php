<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Catálogo de Filmes</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario.php">Adicionar Filme</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Catálogo de Filmes -->
    <div class="container mt-4">
        <div class="row">
            <?php
            $result = $conn->query("SELECT * FROM filmes");
            while ($filme = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-3">';
                echo '  <div class="card" data-bs-toggle="modal" data-bs-target="#filmeModal" data-id="' . $filme['id'] . '">';
                echo '    <img src="' . $filme['foto'] . '" class="card-img-top" alt="' . $filme['nome'] . '">';
                echo '    <div class="card-body">';
                echo '      <h5 class="card-title">' . $filme['nome'] . '</h5>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="filmeModal" tabindex="-1" aria-labelledby="filmeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filmeModalLabel">Detalhes do Filme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Detalhes do filme serão carregados aqui com JavaScript -->
                </div>
            </div>
        </div>
    </div>



    <script>
        $('#filmeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botão que acionou o modal
            var id = button.data('id'); // Extrair info do atributo data-id

            // TODO: Fazer uma requisição para buscar os detalhes do filme usando o ID
            // e atualizar o conteúdo do modal.
        });
    </script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>