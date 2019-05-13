<?
//Define data e hora BRASILEIRO
//setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
//date_default_timezone_set('America/Sao_Paulo');
$hoje=date("d/m/Y"); 
$agora=date("H:i"); 
?>
<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//PT-BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 <title>Cla Bugigangas</title>
 <link rel='shortcut icon' href='/icone.png'>
 <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/outros.css" />
 <!--<link rel="stylesheet" type="text/css" href="http://www.000webhost.com/images/index/styles.css" />-->
 <!-- modernizr enables HTML5 elements and feature detects -->
 <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>
<body>
<?PHP include 'conecta.php';?>
<?PHP include 'controlador.php';?>
</body>
</html>
			