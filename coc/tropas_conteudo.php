<?PHP 
include 'conecta.php';
//Códigos SQL
$connect = mysql_connect($mysql_host,$mysql_user,$mysql_password);
$db = mysql_select_db($mysql_database);

$UsuariosSql=mysql_query("SELECT nome, id FROM usuarios WHERE cla='$cla_cookie' ORDER BY id DESC;",$connect);
$TropasSql=mysql_query("SELECT  * FROM usuario_tropas ORDER BY id DESC;",$connect);


if (isset($_GET['nivel'])) { //Adicionar ou Remover level
	$nivel = $_GET['nivel'];
	if ($nivel=='altera'){
		if (isset($_POST['addlevel'])) {
			$AddOrRemove = $_POST['addlevel'];
		} else {
			$AddOrRemove = $_POST['remlevel'];
		}			
		$GetId = $_POST['id'];
		$GetTropa = $_POST['tropa'];
		//echo "Add or Rem?? $AddOrRemove<br> Id: $GetId <br> Tropa: $GetTropa";
		mysql_query("UPDATE usuario_tropas SET $GetTropa=$GetTropa $AddOrRemove 1 WHERE id=$GetId;",$connect);
		//echo '<meta http-equiv="refresh" content=0;url="?menu=minions>';
		header("Location: ?menu=minions");
	}
}
?>
<div style="margin: 6px; overflow: auto; font-size: 12px;">
<style>
.tabelaprincipal td, .tabelaprincipal th  {text-align:center;}
.inputherois {width:20px;}
</style>
<TABLE class="tabelaprincipal" >
	<TR>
		<TD>
			<TABLE class="tabela" >
				<TR>
					<TH>
						Membros
					</TH>
					<TH COLSPAN=2>
						Her&oacute;is
					</TH>
					<TH COLSPAN=10>
						Tropas Normais
					</TH>
					<TH COLSPAN=6>
						Tropas "Negras"
					</TH>
					<TH COLSPAN=5>
						Feiti&ccedil;os
					</TH>
					<TH COLSPAN=3>
						Feiti&ccedil;os "Negros"
					</TH>
				</TR>
				<TR>
					<TD>
						#
					</TD>
				<!-- Tropas Normais -->
					<TD>
						<IMG SRC="images/miniaturas/rei.png">
						Rei
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/rainha.png" width='50' height='50'>
						Rainha
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/bb.png" height='50'>
						B&aacute;rbaro
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/ar.png">
						Arqueira
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/gg.png">
						Gigante
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/gb.png">
						Goblin
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/qm.png">
						Quebra-Muro
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/bl.png" height='50'>
						Bal&atilde;o
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/mg.png" width='50' height='50'>
						Mago
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/cr.png">
						Curadora
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/dr.png" height='50'>
						Drag&atilde;o
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/pk.png" width='50'>
						Pekka
					</TD>
					
				<!-- Tropas Negras 6 -->
					<TD>
						<IMG SRC="images/miniaturas/sr.png">
						Servo
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/corredor.png" width='50'>
						Corredor
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/vq.png">
						Valqu&iacute;ria
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/golem.png">
						Golem
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/br.png" width='50' height='50'>
						Bruxa
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/lava.png">
						Lava
					</TD>
				<!-- Feiticos  --> 
					<TD>
						<IMG SRC="images/miniaturas/relam.png">
						Rel&acirc;mpago
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/cura.png">
						Cura
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/fur.png">
						F&uacute;ria
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/sal.png">
						Salto
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/gel.png">
						Gelo
					</TD>
				<!-- Feitico Negro -->
					<TD>
						<IMG SRC="images/miniaturas/vene.png">
						Veneno
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/terr.png">
						Terremoto
					</TD>
					<TD>
						<IMG SRC="images/miniaturas/prec.png">
						Precipita&ccedil;&atilde;o
					</TD>
				</TR>
				
				
					
				<?PHP 
				//Variáveis iniciais de MelhoresTropas
					$MelhorRei=0;$MelhorRainha=0;
					
					$MelhorBarbaro=0;$MelhorArqueira=0;
					$MelhorGigante=0;$MelhorGoblin=0;
					$MelhorQMuro=0;$MelhorBalao=0;
					$MelhorMago=0;$MelhorCuradora=0;
					$MelhorDragao=0;$MelhorPekka=0;
					
					$MelhorServo=0;$MelhorCorredor=0;
					$MelhorValquiria=0;$MelhorGolem=0;
					$MelhorBruxa=0;$MelhorLava=0;
					
					$MelhorRelampago=0;$MelhorCura=0;
					$MelhorFuria=0;$MelhorSalto=0;
					$MelhorGelo=0;
					
					$MelhorVeneno=0;
					$MelhorTerremoto=0;
					$MelhorPrecipitacao=0;
					
					while ($UsuariosRes = mysql_fetch_array($UsuariosSql)){
						//Obter Resultados dos Usuários
						$Nome = $UsuariosRes['nome'];
						$ID =  $UsuariosRes['id'];
						
						//Carregar Sql das Tropas junto 
						$TropasRes = mysql_fetch_array($TropasSql);
						// Obter Resultados
						$IdTropas = $TropasRes['id'];
						//Herois
						$rei = $TropasRes['rei'];
						$rainha = $TropasRes['rainha'];
						//Tropas normais
						$barbaro = $TropasRes['barbaro'];
						$arqueira = $TropasRes['arqueira'];
						$gigante = $TropasRes['gigante'];
						$goblin = $TropasRes['goblin'];
						$qmuro = $TropasRes['qmuro'];
						$balao = $TropasRes['balao'];
						$mago = $TropasRes['mago'];
						$curadora = $TropasRes['curadora'];
						$dragao = $TropasRes['dragao'];
						$pekka = $TropasRes['pekka'];
						//Tropas "Negras"
						$servo = $TropasRes['servo'];
						$corredor = $TropasRes['corredor'];
						$valquiria = $TropasRes['valquiria'];
						$golem = $TropasRes['golem'];
						$bruxa = $TropasRes['bruxa'];
						$lava = $TropasRes['lava'];
						//Feiticos
						$relampago = $TropasRes['relampago'];
						$cura = $TropasRes['cura'];
						$furia = $TropasRes['furia'];
						$salto = $TropasRes['salto'];
						$gelo = $TropasRes['gelo'];
						//Feiticos "Negros"
						$veneno = $TropasRes['veneno'];
						$terremoto = $TropasRes['terremoto'];
						$precipitacao = $TropasRes['precipitacao'];
						
						//Cor-Sim // Cor-Não
						$QualCor=' style="background-color:#DDDDDD;"';
						
						//Configuração para Alterar Nível das Tropas 
						$RemoveLevel='';
						$AddLevel='';
						$FormOpen='';
						$FormClose='';
						$TakeId='';
						
						//Obter MelhoresTropas
						//Rei
						if ($rei ==0) {
							$MelhorRei='';$NomeMelhorRei='Ninguem'; 
						} else if( $rei > $MelhorRei) {
							$MelhorRei = $rei;
							$NomeMelhorRei = $Nome;
						} 
						//Rainha
						if ($rainha ==0) {
							$MelhorRainha='';$NomeMelhorRainha='Ninguem'; 
						} else if ($rainha > $MelhorRainha) {
							$MelhorRainha = $rainha;
							$NomeMelhorRainha = $Nome;
						}
						//Barbaro
						if ($barbaro > $MelhorBarbaro) {
							$MelhorBarbaro = $barbaro;
							$NomeMelhorBarbaro = $Nome;
						}
						//Gigante
						if ($arqueira ==0) {
							$MelhorArqueira='';$NomeMelhorArqueira='Ninguem'; 
						} else if ($arqueira > $MelhorArqueira) {
							$MelhorArqueira = $arqueira;
							$NomeMelhorArqueira = $Nome;
						}
						//Gigante
						if ($gigante ==0) {
							$MelhorGigante='';$NomeMelhorGigante='Ninguem'; 
						} else if ($gigante > $MelhorGigante) {
							$MelhorGigante = $gigante;
							$NomeMelhorGigante = $Nome;
						}
						//Goblin
						if ($goblin ==0) {
							$MelhorGoblin='';$NomeMelhorGoblin='Ninguem'; 
						} else if ($goblin > $MelhorGoblin) {
							$MelhorGoblin = $goblin;
							$NomeMelhorGoblin = $Nome;
						}
						//Quebra-Muro
						if ($qmuro ==0) {
							$MelhorQMuro='';$NomeMelhorQMuro='Ninguem'; 
						} else if ($qmuro > $MelhorQMuro) {
							$MelhorQMuro = $qmuro;
							$NomeMelhorQMuro = $Nome;
						}
						//Balão
						if ($balao ==0) {
							$MelhorBalao='';$NomeMelhorBalao='Ninguem'; 
						} else if ($balao > $MelhorBalao) {
							$MelhorBalao = $balao;
							$NomeMelhorBalao = $Nome;
						}
						//Mago
						if ($mago ==0) {
							$MelhorMago='';$NomeMelhorMago='Ninguem'; 
						} else if ($mago > $MelhorMago) {
							$MelhorMago = $mago;
							$NomeMelhorMago = $Nome;
						}
						//Curadora Anja
						if ($curadora ==0) {
							$MelhorCuradora='';$NomeMelhorCuradora='Ninguem'; 
						} else if ($curadora > $MelhorCuradora) {
							$MelhorCuradora = $curadora;
							$NomeMelhorCuradora = $Nome;
						}
						//Dragão
						if ($dragao ==0) {
							$MelhorDragao='';$NomeMelhorDragao='Ninguem'; 
						} else if ($dragao > $MelhorDragao) {
							$MelhorDragao = $dragao;
							$NomeMelhorDragao = $Nome;
						}
						//Pekka
						if ($pekka ==0) {
							$MelhorPekka='';$NomeMelhorPekka='Ninguem'; 
						} else if ($pekka > $MelhorPekka) {
							$MelhorPekka = $pekka;
							$NomeMelhorPekka = $Nome;
						}
						//Servo
						if ($servo ==0) {
							$MelhorServo='';$NomeMelhorServo='Ninguem'; 
						} else if ($servo > $MelhorServo) {
							$MelhorServo = $servo;
							$NomeMelhorServo = $Nome;
						}
						//Corredor
						if ($corredor ==0) {
							$MelhorCorredor='';$NomeMelhorCorredor='Ninguem'; 
						} else if ($corredor > $MelhorCorredor) {
							$MelhorCorredor = $corredor;
							$NomeMelhorCorredor = $Nome;
						}
						//valquiria
						if ($valquiria ==0) {
							$MelhorValquiria='';$NomeMelhorValquiria='Ninguem'; 
						} else if ($valquiria > $MelhorValquiria) {
							$MelhorValquiria = $valquiria;
							$NomeMelhorValquiria = $Nome;
						}
						//golem
						if ($golem ==0) {
							$MelhorGolem='';$NomeMelhorGolem='Ninguem'; 
						} else if ($golem > $MelhorGolem) {
							$MelhorGolem = $golem;
							$NomeMelhorGolem = $Nome;
						}
						//bruxa
						if ($bruxa ==0) {
							$MelhorBruxa='';$NomeMelhorBruxa='Ninguem'; 
						} else if ($bruxa > $MelhorBruxa) {
							$MelhorBruxa = $bruxa;
							$NomeMelhorBruxa = $Nome;
						}
						//lava
						if ($lava ==0) {
							$MelhorLava='';$NomeMelhorLava='Ninguem'; 
						} else if ($lava > $MelhorLava) {
							$MelhorLava = $lava;
							$NomeMelhorLava = $Nome;
						}
						//relampago
						if ($relampago ==0) {
							$MelhorRelampago='';$NomeMelhorRelampago='Ninguem'; 
						} else if ($relampago > $MelhorRelampago) {
							$MelhorRelampago = $relampago;
							$NomeMelhorRelampago = $Nome;
						}
						//cura
						if ($cura ==0) {
							$MelhorCura='';$NomeMelhorCura='Ninguem'; 
						} else if ($cura > $MelhorCura) {
							$MelhorCura = $cura;
							$NomeMelhorCura = $Nome;
						}
						//furia
						if ($furia ==0) {
							$MelhorFuria='';$NomeMelhorFuria='Ninguem'; 
						} else if ($furia > $MelhorFuria) {
							$MelhorFuria = $furia;
							$NomeMelhorFuria = $Nome;
						}
						//salto
						if ($salto ==0) {
							$MelhorSalto='';$NomeMelhorSalto='Ninguem'; 
						} else if ($salto > $MelhorSalto) {
							$MelhorSalto = $salto;
							$NomeMelhorSalto = $Nome;
						}
						//gelo
						if ($gelo ==0) {
							$MelhorGelo='';$NomeMelhorGelo='Ninguem'; 
						} else if ($gelo > $MelhorGelo) {
							$MelhorGelo = $gelo;
							$NomeMelhorGelo = $Nome;
						}
						//veneno
						if ($veneno ==0) {
							$MelhorVeneno='';$NomeMelhorVeneno='Ninguem'; 
						} else if ($veneno > $MelhorVeneno) {
							$MelhorVeneno = $veneno;
							$NomeMelhorVeneno = $Nome;
						}
						//terremoto
						if ($terremoto ==0) {
							$MelhorTerremoto='';$NomeMelhorTerremoto='Ninguem'; 
						} else if ($terremoto > $MelhorTerremoto) {
							$MelhorTerremoto = $terremoto;
							$NomeMelhorTerremoto = $Nome;
						}
						//precipitacao
						if ($precipitacao ==0) {
							$MelhorPrecipitacao='';$NomeMelhorPrecipitacao='Ninguem'; 
						} else if ($precipitacao > $MelhorPrecipitacao) {
							$MelhorPrecipitacao = $precipitacao;
							$NomeMelhorPrecipitacao = $Nome;
						}
						
						
						if ($Nome==$login_cookie) {
							$FormOpen = "<form action='?menu=minions&nivel=altera' method='post'>";
							$FormClose = '</form>';
							$AddLevel ="<input type='submit' name='addlevel' value='+' style='width:15px;'/>";
							$RemoveLevel ="<input type='submit' name='remlevel' value='-' style='width:15px;'/>";
							$TakeId = "<input type='hidden' name='id' value='$ID'/>";
							
							//Se o Nível das Tropas for ZERO - Mostrar Input Text
							/*if ($rei==0) {$rei='<input class="inputherois" type="text" name="rei" value="'.$rei.'" >';}
							if ($rainha==0) {$rainha='<input class="inputherois" type="text" name="rainha" value="'.$rainha.'" >';}
							if ($barbaro==0) {$barbaro='<input class="inputherois" type="text" name="barbaro" value="'.$barbaro.'" >';}
							if ($arqueira==0) {$arqueira='<input class="inputherois" type="text" name="arqueira" value="'.$arqueira.'" >';}
							if ($gigante==0) {$gigante='<input class="inputherois" type="text" name="gigante" value="'.$gigante.'" >';}
							
							if ($goblin==0) {$goblin='<input class="inputherois" type="text" name="goblin" value="'.$goblin.'" >';}
							if ($qmuro==0) {$qmuro='<input class="inputherois" type="text" name="qmuro" value="'.$qmuro.'" >';}
							if ($balao==0) {$balao='<input class="inputherois" type="text" name="balao" value="'.$balao.'" >';}
							if ($mago==0) {$mago='<input class="inputherois" type="text" name="mago" value="'.$mago.'" >';}
							if ($curadora==0) {$curadora='<input class="inputherois" type="text" name="curadora" value="'.$curadora.'" >';}
							if ($dragao==0) {$dragao='<input class="inputherois" type="text" name="dragao" value="'.$dragao.'" >';}
							if ($pekka==0) {$pekka='<input class="inputherois" type="text" name="pekka" value="'.$pekka.'" >';}
							if ($servo==0) {$servo='<input class="inputherois" type="text" name="servo" value="'.$servo.'" >';}
							if ($valquiria==0) {$valquiria='<input class="inputherois" type="text" name="valquiria" value="'.$valquiria.'" >';}
							if ($golem==0) {$golem='<input class="inputherois" type="text" name="golem" value="'.$golem.'" >';}
							if ($bruxa==0) {$bruxa='<input class="inputherois" type="text" name="bruxa" value="'.$bruxa.'" >';}
							if ($lava==0) {$lava='<input class="inputherois" type="text" name="lava" value="'.$lava.'" >';}
							
							if ($relampago==0) {$relampago='<input class="inputherois" type="text" name="relampago" value="'.$relampago.'" >';}
							if ($cura==0) {$cura='<input class="inputherois" type="text" name="cura" value="'.$cura.'" >';}
							if ($furia==0) {$furia='<input class="inputherois" type="text" name="furia" value="'.$furia.'" >';}
							if ($salto==0) {$salto='<input class="inputherois" type="text" name="salto" value="'.$salto.'" >';}
							if ($gelo==0) {$gelo='<input class="inputherois" type="text" name="gelo" value="'.$gelo.'" >';}
							
							if ($veneno==0) {$veneno='<input class="inputherois" type="text" name="veneno" value="'.$veneno.'" >';}
							if ($terremoto==0) {$terremoto='<input class="inputherois" type="text" name="terremoto" value="'.$terremoto.'" >';}
							if ($precipitacao==0) {$precipitacao='<input class="inputherois" type="text" name="precipitacao" value="'.$precipitacao.'" >';}*/
						}
						
						//Imprimir Tabela
						echo "
						<TR >
						<TD >$Nome</TD>
						<!-- Herois -->
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='rei'> $rei $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='rainha'> $rainha $RemoveLevel $FormClose</TD>
						<!-- Tropas -->
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='barbaro'> $barbaro $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='arqueira'> $arqueira $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='gigante'> $gigante $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='goblin'> $goblin $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='qmuro'> $qmuro $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='balao'> $balao $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='mago'> $mago $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='curadora'> $curadora $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='dragao'> $dragao $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='pekka'> $pekka $RemoveLevel $FormClose</TD>
						<!-- Tropas 'Negras'-->
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='servo'> $servo $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='corredor'> $corredor $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='valquiria'> $valquiria $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='golem'> $golem $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='bruxa'> $bruxa $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='lava'> $lava $RemoveLevel $FormClose</TD>
						<!-- Feiticos -->
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='relampago'> $relampago $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='cura'> $cura  $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='furia'> $furia $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='salto'> $salto $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='gelo'> $gelo $RemoveLevel $FormClose</TD>
						<!-- Feiticos 'negros' -->
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='veneno'> $veneno $RemoveLevel $FormClose</TD>
						<TD $QualCor>$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='terremoto'> $terremoto $RemoveLevel $FormClose</TD>
						<TD >$FormOpen $AddLevel $TakeId<input type='hidden' name='tropa' value='precipitacao'> $precipitacao $RemoveLevel $FormClose</TD>
						</TR>
						";
					} 
				?>
			</TABLE>
		</TD>
	</TR>
</TABLE>
</div> 
<?PHP include 'tropas_melhores.php'; ?>
