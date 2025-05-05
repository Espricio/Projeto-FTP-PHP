<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto FTP-PHP</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
    define("pastaUpload", "Arquivos/");
?>

<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4 text-center">Upload de Arquivo</h1>

        <!-- Formulário de upload -->
        <form method="post" action="upload.php" enctype="multipart/form-data"
            class="border p-4 bg-white rounded shadow-sm">
            
            <!-- Limite de tamanho do arquivo (5 MB) -->
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

            <div class="mb-3">
                <label for="arquivo" class="form-label">Escolha um arquivo</label>
                <input type="file" name="arquivo" id="arquivo" class="form-control">
            </div>

            <div class="d-grid">
                <button name="envia-arquivo" type="submit" value="Enviar" class="btn btn-outline-primary">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <!-- Lista de Arquivos -->
    <div class="container py-5">
        <h2 class="mb-4 text">Arquivos:</h2>

        <ul class="border p-4 bg-white rounded shadow-sm list-group">
            <?php
            
            $arquivos = scandir(pastaUpload);

            foreach($arquivos as $arquivo){
                if ($arquivo !== '.' && $arquivo !== '..') {
                    echo '<li class="list-group-item">'.$arquivo.'</li>';
                }
            }

            ?>
        </ul>
    </div>
</body>

</html>
