 <?php
 // recuperar os valores de configuracao do arquivo config.php
 require_once '../config.php';
 header("content type: ");

 // criando uma conexao com o mysql
 // mysqli_connect(servidor,usuario,senha,banco);
 $con = mysqli_connect(BD_SERVER,BD_USUARIO,BD_SENHA,BD_BANCO); 

 // RECEBENDO OS DADOS DO FORMULARIO 
 // isset -> verifica se a variavel existe
 if(isset($_POST["email"]) && isset($_POST["nome"]) && isset($_POST["senha"]) && isset($_POST["cpf"]) && isset($_POST["cep"]) && isset($_POST["telefone"]) && isset($_POST["endereco"]) ){
        // verificando se os valores nao estao vazios
        if(!empty($_POST["email"]) && !empty($_POST["nome"]) && !empty($_POST["senha"]) && !empty($_POST["cpf"]) && !empty($_POST["cep"]) && !empty($_POST["telefone"]) && !empty($_POST["endereco"]) ){
        // criar o comando sql / query
        $sql = "Insert into cliente(email,nome,senha,cpf,cep,telefone,endereco) values('".$_POST['email']."','".$_POST['nome']."','".$_POST['senha']."','".$_POST['cpf']."','".$_POST['cep']."','".$_POST['telefone']."','".$_POST['endereco']."' );";
		
        // execucao do comando no banco de dados
        if( $con->query($sql) == TRUE) 
		{
            echo
            "<script>
                  alert('Usuario Cadastrado com Sucesso!');
                  window.location.href='../index.html';
              </script>";
        }
		else 
		{ // caso o cadastro falhar
            echo
            "<script>
                  alert('Erro ao cadastrar o usuário!');
                  window.location.href='../index.html';
              </script>";
        }

        // fechar a conexao
    $con->close();
    }
	
	else{ // redireciona para o index.html
     header("location:../index.html");
	}

 }
 else{ // se as variaveis não existe redireciona para o index.php
     header("location:../index.html");
 }
 
 ?>

