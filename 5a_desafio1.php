<?php 
// 1. Processamento do formulário (executa ANTES de enviar qualquer HTML)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $ano_nascimento = (int)$_POST['ano_nascimento'];

    // Salva os dados no arquivo TXT
    $arquivo = fopen('log_acessos.txt', 'a');
    $linha = $nome . ';' . $ano_nascimento . "\n";
    fwrite($arquivo, $linha);
    fclose($arquivo);

    // Calcula a idade
    $ano_atual = (int)date('Y');
    $idade = $ano_atual - $ano_nascimento;

    // Define o status e redireciona (incluindo o nome na URL)
    $status = ($idade >= 18) ? 'sucesso' : 'negado';
    header('Location: ' . $_SERVER['PHP_SELF'] . '?status=' . $status . '&idade=' . $idade . '&nome=' . urlencode($nome));
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <!-- Exibe a mensagem de retorno, se existir -->
    <?php 
    if (isset($_GET['status'])) { 
        $idade_informada = isset($_GET['idade']) ? (int)$_GET['idade'] : 0; 
        $nome_informado = isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : '';

        if ($_GET['status'] == 'sucesso') { 
            echo "<p style='color: green;'><strong>Acesso permitido!</strong> Você tem $idade_informada anos, $nome_informado.</p>"; 
        } elseif ($_GET['status'] == 'negado') { 
            echo "<p style='color: red;'><strong>Acesso negado.</strong> É necessário ter pelo menos 18 anos (Sua idade: $idade_informada anos), $nome_informado.</p>"; 
        } 
    }
    ?>

    <!-- Formulário de cadastro -->
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="ano_nascimento">Ano de nascimento:</label>
        <input type="number" id="ano_nascimento" name="ano_nascimento" min="1900" max="<?php echo date('Y'); ?>" required>

        <button type="submit">Inserir dados</button>
    </form>
</body>
</html>