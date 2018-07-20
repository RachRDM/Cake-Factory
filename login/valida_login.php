<?php
// recuperar os valores de configuracao do arquivo config.php
 require_once '../config.php';
 header("content type: ");

// criando uma conexao com o mysql
// mysqli_connect(servidor,usuario,senha,banco);
 $con = mysqli_connect(BD_SERVER,BD_USUARIO,BD_SENHA,BD_BANCO); 

 $cliente = $_POST["valida_nome"];
// RECEBENDO OS DADOS DO FORMULARIO 
// isset -> verifica se a variavel existe
if(isset($_POST["valida_nome"]) && isset($_POST["valida_senha"])){
	// verificando se os valores nao estao vazios
	if(!empty($_POST["valida_nome"]) && !empty($_POST["valida_senha"])){
		// criar o comando sql / query
		$sql = "select * from cliente where (email = '".$_POST['valida_nome']."' or nome = '".$_POST['valida_nome']."') and senha = '".$_POST['valida_senha']."';";
		
		// recebendo o resultado da execucao do comando no banco
		$result = $con->query($sql);
		// testando se o usuario esta correto
		if($result->num_rows > 0){
			echo 			
			"<script>   
				alert('Bem vindo(a) $cliente !');
				window.location.href='../select.html';
			</script>";
		}else{ // caso o login falhar
			echo 			
			"<script>   
				alert('Login ou senha incorretos!');
				window.location.href='../index.html';
			</script>";
		}
	
		// fechar a conexao
	$con->close();
	}
	
	else{ // redireciona para o index
		header("location:../index.html");
	}

}
else{ // se as variáveis não existe redireciona para o index.php
	header("location:../.html");
}

