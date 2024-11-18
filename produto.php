<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbContato";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter o ID do produto a partir da URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Buscar o produto pelo ID
$sql = "SELECT NOME_PROD, VALOR_PROD, DESC_PROD, IMAGEM_PROD FROM TB_PRODUTO WHERE ID_PROD = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Exibir os detalhes do produto
    $produto = $result->fetch_assoc();
} else {
    echo "Produto não encontrado.";
    exit;
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo htmlspecialchars($produto['NOME_PROD']); ?></title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 18rem;">
            <?php
            // Verificar se a imagem existe antes de exibir
            $imagem_produto = isset($produto['IMAGEM_PROD']) && !empty($produto['IMAGEM_PROD']) ? 'assets/img/' . $produto['IMAGEM_PROD'] : 'assets/img/default.png';
            ?>
            <img src="<?php echo $imagem_produto; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produto['NOME_PROD']); ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($produto['NOME_PROD']); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($produto['DESC_PROD']); ?></p>
              <p class="card-text">Preço: R$ <?php echo number_format($produto['VALOR_PROD'], 2, ',', '.'); ?></p>
              <a href="LoginAdm.php?id=<?php echo $id; ?>" class="btn btn-primary">Comprar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

