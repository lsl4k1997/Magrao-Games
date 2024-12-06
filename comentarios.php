<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Conexão com o banco de dados
$host = "localhost";
$dbname = "comentarios";
$username = "root"; // Substitua com o seu usuário MySQL
$password = "Lovegame!123"; // Substitua com a sua senha MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Variáveis para armazenar os dados do formulário
$nome = "";
$texto = "";

// Processa o formulário e salva o comentário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['inputName'] ?? '';
    $texto = $_POST['inputText'] ?? '';

    if (!empty($nome) && !empty($texto)) {
        // Insere o comentário no banco de dados
        $stmt = $pdo->prepare("INSERT INTO comentarios (nome, texto) VALUES (:nome, :texto)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':texto', $texto);
        $stmt->execute();

        // Redireciona após o envio do formulário para evitar reenvio no F5
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit(); // Certifique-se de que o script termina após o redirecionamento
    }
}

// Recupera todos os comentários
$stmt = $pdo->query("SELECT nome, texto, data FROM comentarios ORDER BY data DESC");
$comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7fa;
    }

    .container {
        width: 100%;
        margin: 20px auto;
    }

    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
    }

    .form-label {
        font-size: 1rem;
        color: #34495e;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .btn-submit {
        background-color: #3498db;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 150px;
        font-size: 1.1rem;
    }

    .btn-submit:hover {
        background-color: #2980b9;
    }

    .comment-card {
        background-color: #fff;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .comment-card h5 {
        color: #3498db;
    }

    .comment-card p {
        color: #7f8c8d;
    }

    .comment-card small {
        color: #95a5a6;
    }
</style>
    <div class="container">
        <!-- Formulário de comentário -->
        <div class="form-container">
            <h2>Deixe seu Comentário</h2>
            <form action="" method="POST">
                <label for="inputName" class="form-label">Nome:</label>
                <input type="text" name="inputName" id="inputName" class="form-control" placeholder="Digite seu nome..." required maxlength="50" value="<?= htmlspecialchars($nome) ?>">

                <label for="inputText" class="form-label">No que está pensando?</label>
                <textarea name="inputText" id="inputText" class="form-control" rows="4" placeholder="Escreva aqui..." required><?= htmlspecialchars($texto) ?></textarea>

                <button type="submit" class="btn-submit">Comentar</button>
            </form>
        </div>

        <!-- Exibir os comentários -->
        <div id="comentarios">
            <h2 class="text-center">Comentários</h2>
            <?php if (count($comentarios) > 0): ?>
                <?php foreach ($comentarios as $comentario): ?>
                    <div class="comment-card">
                        <h5><?= htmlspecialchars($comentario['nome']) ?></h5>
                        <p><?= nl2br(htmlspecialchars($comentario['texto'])) ?></p>
                        <small><?= date('d/m/Y H:i:s', strtotime($comentario['data'])) ?></small>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center" style="color: #95a5a6;">Ainda não há comentários.</p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>