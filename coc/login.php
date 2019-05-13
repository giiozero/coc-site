<?php
	
    include 'conecta.php';
    $login = $_POST['login'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);
    $connect = mysql_connect($mysql_host,$mysql_user,$mysql_password);
    $db = mysql_select_db($mysql_database);
	
        if (isset($entrar)) {
            $verifica = mysql_query("SELECT * FROM usuarios WHERE usuario='$login' AND senha='$senha'") or die("Erro ao selecionar");
                if (mysql_num_rows($verifica)<=0){
					
                    echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='?menu=login';</script>";
					echo "Você será redirecionado";
                    die();
                }else{
                    setcookie("nome",mysql_result($verifica ,0,'nome'), time()+3600);
                    setcookie("admin",mysql_result($verifica ,0,'admin'), time()+3600);
                    setcookie("cla",mysql_result($verifica ,0,'cla'), time()+3600);
                    setcookie("usuario",$login,time()+3600);

                    header("Location:?menu=inicio");
                }
        }
?>

