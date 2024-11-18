<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
</head>
<body>

<?php
session_start();

if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
{ 
    $Botao =$_POST["Botao"];
    $Nome = $_POST["nome_cadastro"];
    $Email = $_POST["usuario_cadastro"];
    $SenhaAdm = $_POST["senha_cadastro"];
    
    include "conexao.php";
    if ($Botao == "Inserir")
    {   
        try
        {
            if ($_POST["senha_cadastro"] == $_POST["senha_confirma"])
            {
                $Comando=$conexao->prepare("INSERT INTO TB_CADASTRO_ADM (NOME_ADM, EMAIL_ADM, SENHA_ADM) VALUES ( ?, ?, ?)");
                $Comando->bindParam(1, $Nome);
                $Comando->bindParam(2, $Email);
                $Comando->bindParam(3, $SenhaAdm);

                if ($Comando->execute())
                {
                    if ($Comando->rowCount () >0) 
                    {
                        echo "<script> alert('Cadastro Realizado com Sucesso!')</script>"; 
                        
                        $_SESSION["controleAdm"] = "cadastrado";  
                        $_SESSION["nomeAdm"] = $Nome;  // Armazenando o nome do usuário na sessão

                        echo "<A href=\"pagamento.php\">Cadastrado, clique aqui para realizar o pagamento</A>";
                    }
                    else 
                    {
                        echo "Erro ao tentar efetivar o contato.";
                    }
                }
                else 
                { 
                    throw new PDOException("Erro: Não foi possível executar a declaração SQL.");
                }
            } 
            else 
            {
                echo ('Senha não confere').'<BR>';
                echo "<A href=\"CadastroAdm.php\">Cadastro</A>";
            }     
        }   
        catch (PDOException $erro)
        {
            echo"Erro" . $erro->getMessage();
        }
    }
}
else 
{ 
?>
 <form name="form1" action="CadastroAdm.php?valor=enviado" method="POST">
  Nome: <br>
  <input class="input" type="text" id ="nome_cadastro" placeholder="Preencher Nome" name="nome_cadastro"><BR><p>
  Usuário (Email): <br>
  <input class="input" type="text" placeholder="Preencher E-mail" name="usuario_cadastro"><BR><p>
  Senha:<br>
  <input class="input" type="password" placeholder="Preencher Senha" name="senha_cadastro" maxlength="8" required><BR><p>
  Confirmar Senha:<br>
  <input class="input" type="password" placeholder="Preencher Senha" name="senha_confirma" maxlength="8" required><BR><p>
  <input name="Botao" type="submit" value="Inserir"><br><p>
 </form>
<?php
}
?>
</body>
</html>
