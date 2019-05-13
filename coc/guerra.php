<?PHP 
include 'conecta.php';
//Códigos SQL
$connect = mysql_connect($mysql_host,$mysql_user,$mysql_password);
$db = mysql_select_db($mysql_database);

$GuerraSql=mysql_query("SELECT * FROM guerra WHERE cla='$cla_cookie' ORDER BY STR_TO_DATE(fim_dia, '%y/%m/%d') DESC;",$connect);

$ArrayGuerra= mysql_fetch_array($GuerraSql);
$_COOKIE['guerraid'] = $ArrayGuerra['id'];
$guerraid = $_COOKIE['guerraid'];
$TamanhoGuerra = $ArrayGuerra['tamanho'];
$Estado= $ArrayGuerra['estado'];
$FimDia = $ArrayGuerra["fim_dia"];
$FimHora = $ArrayGuerra["fim_hora"];
$hoje=date("d/m/Y"); 
$agora=date("H:i", strtotime("-2 hours")); 
//Obter datas invertidas para Comparação
$HojeInv = date("Y/m/d");
$FimDiaInv = date("Y/m/d"); //, strtotime($FimDia)
//Obter datas invertidas para Comparação
$FimTudo  = ''.$FimDiaInv.' '.$FimHora.'';
$HojeTudo = ''.$HojeInv.' '.$agora.'';
$HojeOk = strtotime("$HojeTudo");
$FimOk = strtotime("$FimTudo");
$rank_time=0;
$rank_inimigo=0;
$indiceat=1;


$AtaquesSql=mysql_query("SELECT * FROM ataques WHERE cla='$cla_cookie' AND guerra_id='$guerraid' ORDER BY atacante, ataque ASC;",$connect);
$AtaquesSqlDois=mysql_query("SELECT * FROM ataques WHERE cla='$cla_cookie' AND guerra_id='$guerraid' ORDER BY vitima, ataque ASC;",$connect);
$ContaPontosSql = mysql_query("SELECT estrela, estreladois FROM ataques WHERE cla='$cla_cookie' AND guerra_id='$guerraid'", $connect);

while ($ContaPontosRes = mysql_fetch_array($ContaPontosSql)){
$EstrelaUmTotal = $ContaPontosRes['estrela'];
$EstrelaDoisTotal = $ContaPontosRes['estreladois'];
$rank_time= $rank_time + $EstrelaUmTotal + $EstrelaDoisTotal;
}

$indicemax=$TamanhoGuerra;
$dispatk='class="disp-atk"';
if (mysql_num_rows($GuerraSql)<=0){  ////////////////////////PRIMEIRO LOGIN
		echo "Seja bem-vindo, chefe! Pe&ccedil;a ao seu l&iacute;der para que inicie uma nova guerra.";
		if ($admin_cookie==1){
			echo "<br>...<div class='form_settings'><b>Ops!</b> Desculpe, l&iacute;der! <br>...<br>
			Caso deseje, clique no bot&atilde;o e inicie uma nova batalha!
			<a href='?menu=novaguerra'><input class='submit' type='submit' value='Guerra'></a></div>";
		}
	} else if ($HojeOk >= $FimOk){
  echo "Guerra em estado de $Estado!!<br>";
  echo '<br>';
  echo "<h5>Dia e Hora atual: $HojeTudo </h5>";
  echo "<h5>A guerra termina: $FimTudo </h5>";
    if (isset($_GET['ataque'])=='registrar' || isset($_GET['ataque'])=='gravar'){
     include 'registra_ataque.php';
    } 

echo '
<TABLE class="tabelaprincipal">
	<TR><TD>';
 include 'guerra_tbl_principal.php'; 
echo '            </TD>
		<TD>
	<TABLE class="tabelacampo" style="">
		<TR>
			<TD  colspan=2 STYLE="color:#5B81A6;" >
				Situa&ccedil;&atilde;o de Campo
			</TD>
		</TR>
		<TR>
			<TH>
				#
			</TH>
			<TH></TH>
		</TR>';
	
                $indiceat=1;
                $InQueryAt=1;
                $InQueryIn=1;
		while ($indiceat <= $indicemax){
                if ($InQueryAt==$InQueryIn){
                  $AtaquesQuery= mysql_fetch_array($AtaquesSqlDois);
                  $Vitima= $AtaquesQuery['vitima'];
				  $EstrelaUm=$AtaquesQuery['estrela'];
				  $VitimaDois=$AtaquesQuery['vitimadois'];
				  $EstrelaDois=$AtaquesQuery['estreladois'];
                  $InQueryAt++;
                } 
			ECHO '<TR>
			<TD>
		         '.$indiceat.'
			 </TD>';
			 
			echo '<TD>';
			
			if ($indiceat == $Vitima || $indiceat == $VitimaDois){
				$MelhorEstrela= $EstrelaUm;
				if ($EstrelaUm < $EstrelaDois){
					$MelhorEstrela= $EstrelaDois;
				}
				echo "$MelhorEstrela";
				$InQueryIn++;
			} else {
				echo '0';
			}
			echo'</TD>
			</TR>';
			$indiceat++;
		} //FimWhile
		// Fim Else LoginCookie
				?>
</table>
	</TABLE>
<?PHP } //Fim SE tiver guerra...
	else{//Fim IF se tiver guerra	
		echo "Sem guerras hoje, chefe. Pe&ccedil;a ao seu l&iacute;der para que inicie uma nova guerra.";
		if ($admin_cookie==1){
			echo "<br><br><div class='form_settings'><b>Ops!</b> Desculpe, l&iacute;der! <br> N&atilde;o o reconhecemos, acho que deves ter sofrido bastante em sua &uacute;ltima guerra...<br>
			Caso deseje, clique no bot&atilde;o e inicie uma nova batalha!
			<a href='?menu=novaguerra'><input class='submit' type='submit' value='Guerra'></a></div>";
		}
	}
 ?>
</div>