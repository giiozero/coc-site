<?PHP

$hoje=date("d/m/Y"); 
$agora=date("H:i"); 
//Conexão BD
include 'conecta.php';
$connect = mysql_connect($mysql_host,$mysql_user,$mysql_password);
$db = mysql_select_db($mysql_database);

//Código Mysql
$GuerraSql=mysql_query("SELECT * FROM guerra WHERE cla='$cla_cookie'",$connect);
//Variável contendo valores
$ArrayGuerra= mysql_fetch_array($GuerraSql);

//Variáveis Úteis
$Cla_Id = $_COOKIE['cla']; //Código ID do Clã

//Obter POST
if (isset($_POST['iniciar'])) {
	$tamanho= $_POST['tamanho'];
	$horafalta = $_POST['horafalta'];
	$estadoguerra= $_POST['estadoguerra'];
	$estadoguerrahora='';
	if ($estadoguerra== 'preparacao'){
		$estadoguerrahora='24';
	}
	$inimigo= $_POST['inimigo'];
	$HoraFinalConta = substr("$horafalta", 0, 2);
	$MinutoFinal= substr("$horafalta", 3, 4);
	//$Explode = explode(":", $agora);
	//list($hora, $minuto) = $Explode;
	$SomaHora = date("d/m/Y H:i", mktime(date("H")+$HoraFinalConta +$estadoguerrahora-3, date("i")+$MinutoFinal));
	$DiaFinal= substr("$SomaHora", 0,10);
	$HoraFinal = substr("$SomaHora", 11,16);

	echo "$Cla_Id, $tamanho, '$inimigo', '$DiaFinal', '$HoraFinal', '$estadoguerra'";

	$SqlInserirGuerra="INSERT INTO guerra (cla, tamanho, inimigo, fim_dia, fim_hora, estado) values ('$Cla_Id', '$tamanho', '$inimigo', '$DiaFinal', '$HoraFinal', '$estadoguerra');";
	$insert = mysql_query($SqlInserirGuerra,$connect);
	 if ($insert){echo "<script language='javascript' type='text/javascript'>alert('Boa sorte, chefe! Uma nova guerra chegou!');window.location.href='?menu=inicio';</script>";
					} else {echo "<script language='javascript' type='text/javascript'>alert('Houve um erro.');</script>";}
}
?>
<form method="POST">
<div class="form_settings">

Tamanho<br>
<input type="text" name="tamanho" placeholder="Qts noobs guerrear&atilde;o?" style="width:240px;"><br><br>

Falta quanto tempo para come&ccedil;ar/ terminar a guerra?<br>
<input type="time" name="horafalta"  style="width:240px;"><br><br>

Qual o nome ou sigla do Cl&atilde; contra?<br>
<input type="text" name="inimigo" placeholder="Se for um nome Japones?" style="width:240px;"><br><br>

Qual o estado da guerra?<br>
<select name="estadoguerra" style="width:240px;">
  <option value="preparacao">Prepara&ccedil;&atilde;o</option>
  <option value="batalha">Batalha</option>
</select><br>
<input class="submit" type="submit" name="iniciar" value="Iniciar" style="margin:3px;">
</div>
</form>

