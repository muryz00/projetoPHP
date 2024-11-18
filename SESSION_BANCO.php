<?php
header('Content-Type: text/html; charset=utf-8');
// Testando sessões em PHP
if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) { 
// cria sessão se usuário tiver clicado no botão enviar do formulário
 session_start();
// cria variáveis de sessão e as inicializa com os dados do formulário:
 $_SESSION['banco'] = $_POST['nome_banco'];
 $_SESSION['conta'] = $_POST['conta_banco'];
 $_SESSION['valor'] = $_POST['capital_banco'];
 $_SESSION['taxa'] = $_POST['taxa_banco'];
 $_SESSION['tempo'] = $_POST['tempo_banco'];

 $Capital = $_POST['capital_banco'];
 $Taxa = $_POST['taxa_banco'];
 $Taxa = ($Taxa /100) + 1;
  
 $Tempo = $_POST['tempo_banco'];

 $Total = $Capital * (pow($Taxa, $Tempo));
 
 $_SESSION['rendimento'] = $Total;

 // exibe link para a página 03:
 echo "<a href='SESSION_PEDIDO.php'>Enviar dados !</a>";
 }
else { 
// Se usuário ainda não clicou no botão de enviar, mostra o formulário na página:
?>
<form name="form1" action="SESSION_BANCO.php?valor=enviado" method="POST">
 
 <P> Selecione seu Banco:<br>
			<select name="nome_banco" id="Banco"><br>
			<option default value="Selecione">Selecione seu banco!!</option>
            <option value="Banco do Brasil">Banco do Brasil</option>
            <option value="Banco Caixa Econômica Federal">Caixa Econômica Federal</option>
            <option value="Banco Itaú">Banco Itaú</option>
            <option value="Banco Santander">Banco santander</option>
            </select> <br></p>
 <p>Digite sua Conta: <br><input type="text" name="conta_banco"><br></p>
 <p>Digite o Capital (aplicado): <br><input type="text" name="capital_banco"><br></p>

 <P>Selecione a taxa (ao mês)::<br>
            <select name="taxa_banco" id="Taxa"><br>
            <option default value="Selecione">Selecione a taxa!!</option>
            <option value="0.50">0,50 %</option>
            <option value="0.75">0,75 %</option>
            <option value="1.00">1.00 %</option>
            <option value="1.50">1,50 %</option>
            <option value="1.75">1.75 %</option>
            <option value="2.00">2,00 %</option>
            <option value="2.50">2,50 %</option>
            <option value="3.00">3,00 %</option>
            <option value="3.50">3,50 %</option>
            <option value="4.00">4,00 %</option>
            <option value="4.50">4,50 %</option>
            <option value="5.00">5,00 %</option>
            </select> <br></p>
 
 <P>Selecione o tempo (em meses):<br>
            <select name="tempo_banco" id="Taxa"><br>
            <option default value="Selecione">Selecione quantos meses!!</option>
            <option value="1">1 Mês</option>
            <option value="2">2 Meses</option>
            <option value="3">3 Meses</option>
            <option value="4">4 Meses</option>
            <option value="5">5 Meses</option>
            <option value="6">6 Meses</option>
            <option value="12">1 ano</option>
            <option value="24">2 anos</option>
            <option value="36">3 anos</option>
            <option value="48">4 anos</option>
            <option value="60">5 anos</option>
            </select> <br></p>
 <br>
 <input type="submit" value="Enviar"><br>
 
</form>
<?php
 }
?>