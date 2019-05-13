<?PHP
//$atacante= $_POST['atacante'];
$maximo =10;
$indice=1;
$natk;


if ($_GET['ataque']=='gravar'){
$vitima=$_POST['vitima'];
$estrelasatk=$_POST['estrelasatk'];
$_atacante=$_POST['quematk'];
$guerraid_cookie = $_COOKIE['guerraid'];
$natk = $_POST['natk'];

echo "Atacante: $_atacante";
echo "Coitado: $vitima";
echo "Estrelas de Bicha: $estrelasatk";
echo 'Nº Atk: '.$natk.' ';

if ($natk==2){
mysql_query("UPDATE ataques SET ataque='$natk', vitimadois='$vitima', estreladois='$estrelasatk' WHERE atacante='$_atacante' AND guerra_id='$guerraid_cookie';");
} else {
mysql_query("INSERT INTO ataques(ataque, guerra_id, cla, atacante, vitima, estrela) VALUES ('$natk', '$guerraid_cookie','$cla_cookie','$_atacante','$vitima', '$estrelasatk' );",$connect);
}
} else {

$natk = $_POST['natk'];
echo "<div style='border:dotted #FFF 3px;height:100px;padding:15px;'>

<form action='?menu=guerra&ataque=registrar&ataque=gravar' method='POST'>
<p style='position:relative;float:left;'>Qual o numero da vitima <br>do atacante numero $atacante?<br>
<select name='vitima' style='width:130px;'>";
$indicemax=$TamanhoGuerra;
while ($indice <= $indicemax) {echo "<option value='$indice'>$indice</option>"; $indice++;}

echo "</select></p>

<p style='position:relative;float:left;margin-left:20px;'>Quantas estrelas o cabrunco fez?<br><br>
<select name='estrelasatk' style='width:130px;'>
<option value='0'>0</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
</select>
<input type='hidden' name='quematk' value='$atacante'>
<input type='hidden' name='natk' value='$natk'>
</p><br><br>
<div class='form_settings'>
<input type='submit' class='submit' name='registratk' value='Registrar' style='position:relative;float:left;' >
</div></div></form>
";

}
?>