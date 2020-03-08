        
<?php
    include_once("conexao.php"); 
    // verificando se esta um recebendo POST;
    if(isset($_POST["txt_nome_usuario"], $_POST['txt_email_usuario'], $_POST['txt_senha_usuario'])) {

        $nome_usuario = $_POST['txt_nome_usuario'];  
        $email_usuario = $_POST['txt_email_usuario'];
        $senha_usuario = $_POST['txt_senha_usuario'];
        $senha_encriptada = md5($senha_usuario);
    
       //   VERIFICACAO DE FORM;
        if(empty($nome_usuario) || $nome_usuario == "") {
            // echo "<script> alert('Informe seu nome corretamente') </script>";            
                die(header("Location: erropage.php"));                
        }
        if(strlen($email_usuario) <8 || strstr($email_usuario, '@')==FALSE || $email_usuario == "") {
            // echo "<script> alert('Informe seu E-mail corretamente') </script>";            
                die(header("Location: erropage.php"));
        } 
        if(empty($senha_usuario) || $senha_usuario == "" || strlen($senha_usuario) < 6 ) {  
            // echo "<script> alert('Informe sua senha corretamente') </script>";            
                die(header("Location: erropage.php"));  
        }
        /////////////
            $result_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome_usuario','$email_usuario','$senha_encriptada')";
        ////////////

        // Consulta ao banco de dados;
        if (mysqli_query($conn, $result_usuario)) {            
            echo "<script> alert(' CADASTRO EFETUADO COM SUCESSO! ') </script>"; 
        } else {
        // erro;
            echo "<script> alert(' Não conseguimos efetuar o cadastro, por favor tente novamente. ') </script>"."<br>".mysqli_error($conn);    
        }
            mysqli_close($conn);
    }
 ?>
    <!DOCTYPE html>
            <html class="no-js">
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title> Cadastro </title>
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                   
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <link rel="stylesheet" href="css/styles.css">
                </head>

                <body>
                    <div class="form-content mt-5">
                        <form method="POST" action="">
                            <label class="label-style mt-3">Nome: </label>
                            <input type="text" name="txt_nome_usuario" placeholder="  Nome">

                            <label class="mt-2">E-mail: </label> 
                            <input type="email" name="txt_email_usuario" placeholder="  Email">                                     
                                           
                            <label class="mt-2">Senha: </label> 
                            <input type="password" name="txt_senha_usuario" placeholder="  Senha"> 

                            <input class="botaoCad btn btn-primary mt-3 mb-4" type="submit" value="Cadastrar">
                        </form>
                    </div>
                    
                    <script src="js/scripts.js"></script>
                </body>
            </html>