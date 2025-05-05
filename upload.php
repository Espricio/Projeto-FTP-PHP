<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Upload de Arquivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5"></div>

    <?php

    define("pastaUpload", "Arquivos/");

    // Verifica se não houve erro no upload do arquivo
    if ($_FILES["arquivo"]["error"] === 0) {
        set_time_limit(0); // Impede que o script seja interrompido por tempo de execução

        $size = 3 * 1024 * 1024; // Define o tamanho máximo permitido (3 MB)
        $file = $_FILES["arquivo"]; // Armazena os dados do arquivo enviado

        // Verifica se o arquivo excede o tamanho permitido
        if ($file['size'] > $size) {

            echo '<div class="alert alert-danger" role="alert">🚫 Arquivo muito grande. O limite é de 3MB.</div>';

        } else {

            // move_uploaded_file retorna true se o arquivo for movido com sucesso
            if (move_uploaded_file($file['tmp_name'], './'. pastaUpload . $file['name'])) {

                echo '<div class="alert alert-success" role="alert">✅ Upload feito com sucesso!</div>';
                header("Location: http://localhost/Projeto-FTP-PHP/");

            } else {

                echo '<div class="alert alert-danger" role="alert">❌ Erro ao mover o arquivo para o destino.</div>';

            }

        }

    }

    ?>

    </div>

</body>

</html>
