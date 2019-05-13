<?php
//#8jvucgc0
include 'conecta.php'; 
$nome = $_POST['nome'];
$codcla = $_POST['codcla'];
$login = $_POST['usuario'];
$senha = MD5($_POST['senha']);

    $connect = mysql_connect($mysql_host,$mysql_user,$mysql_password);
    $db = mysql_select_db($mysql_database);

$query_select = "SELECT usuario FROM usuarios WHERE usuario = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['usuario'];

 
    if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='?menu=cadastrar';</script>";
 
        }else{
            if($logarray == $login){
 
                echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='?menu=cadastrar';</script>";
                die();
 
            }else{
                $query = "INSERT INTO usuarios (nome,usuario,senha, cla) VALUES ('$nome','$login','$senha', $codcla)";
                $insert = mysql_query($query,$connect);
                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='?menu=login'</script>";
					$QueryTropas = mysql_query('INSERT INTO usuario_tropas VALUES ((SELECT id FROM usuarios ORDER BY id DESC LIMIT 1), 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);', $connect);
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='?menu=cadastrar</script>";
                }
            }
        }
?>
