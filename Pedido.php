<?php

header('Content-Type: text/html; charset=utf-8');
// retomando a sessão criada:
 session_start();
// Colocando os dados gravados na sessão:
 echo "Os dados recebidos foram:<br><br>";
 echo "Nome: " . $_SESSION['nome'] . "<br>";
 echo "CPF: " . $_SESSION['cpf'] . "<br>";
 echo "Banco: " . $_SESSION['banco'] . "<br>";
 echo "Conta: " . $_SESSION['conta'] . "<br>";
 echo "Taxa ao mês: ". $_SESSION['taxa']. "<br>"; 
 echo "Tempo em meses: ".$_SESSION['tempo']. "<br>";
 
// Colocando os dados gravados da session em variaveis
 $Capital = $_SESSION['valor'];
 $Rendimento = $_SESSION['rendimento'];
 
 $Total = $Rendimento;
 $Rendimento = $Rendimento - $Capital; 
 
 // Formata dados com Reais
 $Capital = number_format($Capital, 2 ,',','.');
 $Rendimento = number_format($Rendimento, 2 ,',','.');
 $Total = number_format($Total, 2 ,',','.');
 
 // Exibe os resultados finais do redimento
 echo "Capital aplicado: R$ " .$Capital. "<br>";
 echo "Rendimento: R$ ".$Rendimento. "<br>" ;
 Echo "Total disponivel apos o periodo : R$ ".$Total. "<br>"
?>
