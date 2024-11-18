<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>
<?php
if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) {
    $Botao = $_POST["Botao"]; 

    if ($Botao == "Logar") {
        session_start();
        include "conexao.php"; // Arquivo para conectar ao banco de dados

        // Obter as informações do formulário
        $usuario_login = $_POST["usuario_login"];
        $senha_login = $_POST["senha_login"];

        // Consulta SQL para verificar o e-mail e senha
        $Comando = $conexao->prepare("SELECT NOME_ADM, EMAIL_ADM FROM TB_CADASTRO_ADM WHERE EMAIL_ADM = ? AND SENHA_ADM = ?");
        $Comando->bindParam(1, $usuario_login);
        $Comando->bindParam(2, $senha_login);
        $Comando->execute();

        // Verificar se a consulta retornou um registro
        if ($Comando->rowCount() > 0) {
            $resultado = $Comando->fetch(PDO::FETCH_ASSOC);

            // Configurar a sessão do usuário
            $_SESSION["controleAdm"] = "logado";
            $_SESSION["nomeAdm"] = $resultado["NOME_ADM"]; // Nome do usuário logado
            $_SESSION["emailAdm"] = $resultado["EMAIL_ADM"]; // E-mail do usuário logado

            // Redirecionar para a página de pagamento
            header("Location: pagamento.php");
            exit();
        } else {
            echo "<script>alert('Usuário ou senha inválidos.');</script>";
        }
    }

    if ($Botao == "Cadastro") {
        // Redireciona para a página de cadastro
        header("Location: CadastroAdm.php");
        exit();
    }

    if ($Botao == "Esqueceu") {
        echo "Função de recuperação de senha ainda não implementada.";
    }
} else {
?> 
    <form action="LoginAdm.php?valor=enviado" method="POST">
        Usuário (E-mail): <br>  
        <input type="text" placeholder="Preencher E-mail" name="usuario_login" required><br><p>

        Senha: <br>
        <input type="password" placeholder="Preencher Senha" name="senha_login" maxlength="8" required><br><p>

        <input name="Botao" type="submit" value="Cadastro">
        <input name="Botao" type="submit" value="Logar">
        <input name="Botao" type="submit" value="Esqueceu">
    </form>
<?php 
}
?>
</body>
</html>
