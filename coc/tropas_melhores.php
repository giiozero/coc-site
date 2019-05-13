<?PHP 

include 'conecta.php';
//Códigos SQL
$connect = mysql_connect($mysql_host,$mysql_user,$mysql_password);
$db = mysql_select_db($mysql_database);

echo "<h2>Melhores Tropas do Cl&atilde;</h2>";

echo "<TABLE class='melhortropa'>
<TR>
	<TH><IMG SRC='images/miniaturas/rei.png'><br>Rei</TH>
	<TH><IMG SRC='images/miniaturas/rainha.png' width='50' height='50'><br>Rainha</TH>
</TR>
<TR>
	<TD>$MelhorRei - $NomeMelhorRei</TD>
	<TD>$MelhorRainha - $NomeMelhorRainha</TD>
</TR>
</TABLE>";

echo "<TABLE class='melhortropa'>
<TR>
	<TH><IMG SRC='images/miniaturas/bb.png' height='50'><br>Barbaro</TH>
	<TH><IMG SRC='images/miniaturas/ar.png'><br>Arqueira</TH>
	<TH><IMG SRC='images/miniaturas/gg.png'><br>Gigante</TH>
	<TH><IMG SRC='images/miniaturas/gb.png'><br>Goblin</TH>
	<TH><IMG SRC='images/miniaturas/qm.png'><br>Muro</TH>
</TR>
<TR>
	<TD>$MelhorBarbaro - $NomeMelhorBarbaro</TD>
	<TD>$MelhorArqueira - $NomeMelhorArqueira</TD>
	<TD>$MelhorGigante - $NomeMelhorGigante</TD>
	<TD>$MelhorGoblin - $NomeMelhorGoblin</TD>
	<TD>$MelhorQMuro - $NomeMelhorQMuro</TD>
</TR>
</TABLE>";

echo "<TABLE class='melhortropa'>
<TR>
	<TH><IMG SRC='images/miniaturas/bl.png' height='50'><br>Balao</TH>
	<TH><IMG SRC='images/miniaturas/mg.png' width='50'><br>Mago</TH>
	<TH><IMG SRC='images/miniaturas/cr.png'><br>Curadora</TH>
	<TH><IMG SRC='images/miniaturas/dr.png' height='50'><br>Dragao</TH>
</TR>
<TR>
	<TD>$MelhorBalao - $NomeMelhorBalao</TD>
	<TD>$MelhorMago - $NomeMelhorMago</TD>
	<TD>$MelhorCuradora - $NomeMelhorCuradora</TD>
	<TD>$MelhorDragao - $NomeMelhorDragao</TD>
</TR>
</TABLE>";

echo "<TABLE class='melhortropa'>
<TR>
	<TH><IMG SRC='images/miniaturas/pk.png' width='50'><br>Pekka</TH>
	<TH><IMG SRC='images/miniaturas/sr.png'><br>Servo</TH>
	<TH><IMG SRC='images/miniaturas/corredor.png' width='50'><br>Runner</TH>
	<TH><IMG SRC='images/miniaturas/vq.png'><br>Valqy</TH>
	<TH><IMG SRC='images/miniaturas/golem.png'><br>Golem</TH>
	<TH><IMG SRC='images/miniaturas/br.png' width=50><br>Bruxa</TH>
	<TH><IMG SRC='images/miniaturas/lava.png'><br>Lava</TH>
</TR>
<TR>
	<TD>$MelhorPekka - $NomeMelhorPekka</TD>
	<TD>$MelhorServo - $NomeMelhorServo</TD>
	<TD>$MelhorCorredor - $NomeMelhorCorredor</TD>
	<TD>$MelhorValquiria - $NomeMelhorValquiria</TD>
	<TD>$MelhorGolem - $NomeMelhorGolem</TD>
	<TD>$MelhorBruxa - $NomeMelhorBruxa</TD>
	<TD>$MelhorLava - $NomeMelhorLava</TD>
</TR>
</TABLE>";

echo "<TABLE class='melhortropa'>
<TR style='margin-top:5px;'>
	<TH><IMG SRC='images/miniaturas/relam.png'><br>Relampago</TH>
	<TH><IMG SRC='images/miniaturas/cura.png' width='50' height='50'><br>Cura</TH>
	<TH><IMG SRC='images/miniaturas/fur.png'><br>Furia</TH>
	<TH><IMG SRC='images/miniaturas/sal.png' width='50' height='50'><br>Salto</TH>
	<TH><IMG SRC='images/miniaturas/gel.png' width='50' height='50'><br>Gelo</TH>
</TR>
<TR>
	<TD>$MelhorRelampago - $NomeMelhorRelampago</TD>
	<TD>$MelhorCura - $NomeMelhorCura</TD>
	<TD>$MelhorFuria - $NomeMelhorFuria</TD>
	<TD>$MelhorSalto - $NomeMelhorSalto</TD>
	<TD>$MelhorGelo - $NomeMelhorGelo</TD>
</TR>";

echo "<TABLE class='melhortropa'>
<TR>
	<TH><IMG SRC='images/miniaturas/vene.png'><BR>Veneno</TH>
	<TH><IMG SRC='images/miniaturas/terr.png'><BR>Terremoto</TH>
	<TH><IMG SRC='images/miniaturas/prec.png'><BR>Precipita&ccedil;&atilde;o</TH>
</TR>
<TR>
	<TD>$MelhorVeneno - $NomeMelhorVeneno</TD>
	<TD>$MelhorTerremoto - $NomeMelhorTerremoto</TD>
	<TD>$MelhorPrecipitacao - $NomeMelhorPrecipitacao</TD>
</TABLE>";







?>
<style>
.melhortropa {
	
	margin-bottom:10px;
	
}
.melhortropa th{
	width:120px;
	color:#F47A20; /*#FAA51A#F47A20*/
	background-color:#5A5859;
}
.melhortropa th:first-child{
	border-radius:10px 0 0 0;
}
.melhortropa th:last-child{
	border-radius:0 10px 0 0;
}
.melhortropa td{
	background-color:#FFF;
	padding-left:5px;
	width:100px;
	color:black;
	
}
</style>