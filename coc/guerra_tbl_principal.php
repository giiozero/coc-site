			<TABLE class="legendaum" >
				<TR>
					<TD class="disp-table" rowspan=2 >
					<strong>Ataque Dispon&iacute;vel</strong>
					</TD>
				
				<TD rowspan=2 class="espaco-table"></td>
				
				
					<TD class="realizado-table" rowspan=2>
						<strong>Ataque Realizado</strong>
					</TD>
				</TR>	
			</TABLE>
		</TD>
		<TD>
			<TABLE class="rank" style="">
				<TR>
					<TD >BUGIGANGAS</TD>
					<TD><?PHP echo $rank_time; ?></TD>
				</TR>
                        </TABLE>
                        <TABLE class="rank">
				<TR>
					<TD>INIMIGO</TD>
					<TD><?PHP echo $rank_inimigo; ?></TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD>
	<TABLE class="tabela">
		<TR>
			<TD COLSPAN=4 STYLE="color:#5B81A6;" >
				Onda 1
			</TD>
		</TR>
		<TR>
			<TH>
				#
			</TH>
			<TH>
				ATACANTE
			</TH>
			<TH>
				ATAQUE 1
			</TH>
			<TH>
				ATAQUE 2
			</TH>
		</TR>
		<?PHP 
		$indicemax=$TamanhoGuerra*1;
                $InQueryAt=1;
                $InQueryIn=1; //Buscar Novamente
		while ($indiceat <= $indicemax){
			//echo "At: $InQueryAt - In: $InQueryIn<br> ";
		if ($InQueryAt==$InQueryIn){
			$AtaquesQuery= mysql_fetch_array($AtaquesSql);
			$AtacanteAtk= $AtaquesQuery['atacante'];
			$AtkUm = $AtaquesQuery['ataque'];
			$Vitima = $AtaquesQuery['vitima'];
			$VitimaDois = $AtaquesQuery['vitimadois'];
			$dispatkum='class="disp-atk"';
			$dispatkdois='class="disp-atk"';
			$InQueryAt++;
		}
		
		if ($AtacanteAtk== $indiceat && $AtkUm>=1){
			 $dispatkum='class="real-atk"';
			 $InQueryIn++;
		}  
		if ($AtacanteAtk== $indiceat && $AtkUm==2){
			 $dispatkdois='class="real-atk"';
		}
		
		echo "<TR><TD>$indiceat</TD>
		<TD>ATACANTE</TD>
		<TD $dispatkum align='center'>";
		//Se For admin, Mostrar form do Atk 1
		if ($admin_cookie==1){ 
			$InputAtk='<input type="image" src="images/atk.png"  value="'.$indiceat.'" name="atacante" style="witdh:20;height:20px;position:absolute;margin-top:-5px;" 
			title="Grave um ataque do atacante '.$indiceat.'" alt="Grave um ataque do atacante '.$indiceat.'">
			<input type="hidden" name="natk" value="1">';
			$InputAtkDois='<input type="image" src="images/atk.png"  value="'.$indiceat.'" name="atacante" style="witdh:20;height:20px;position:absolute;margin-top:-5px;" 
			title="Grave um ataque do atacante '.$indiceat.'" alt="Grave um ataque do atacante '.$indiceat.'">
			<input type="hidden" name="natk" value="2">';
		} else {$InputAtk=''; $InputAtkDois='';}
		  
		  //Se o Número do Atacante == Índice da Tabela && o Número do Atk == 1 (primeiro atk) ---- Mostrar quem ele atacou
		  if ($AtacanteAtk==$indiceat && $AtkUm>=1) { 
			echo ''.$Vitima.'';
		  } else { 
			echo '<form action="?menu=guerra&ataque=registrar" method="post" onclick=\'return confirm("Deseja registrar um ataque do atacante '.$indiceat.'?");\'>
			'.$indiceat.' '.$InputAtk.'</form></TD>'; 
		  }
		  
		echo '<TD  '.$dispatkdois.' align="center">';
		if ($AtacanteAtk==$indiceat && $AtkUm>=2) { 
			echo "$VitimaDois";
		} else if ($AtacanteAtk==$indiceat && $AtkUm==1) {
			echo '<form action="?menu=guerra&ataque=registrar" method="post" onclick=\'return confirm("Deseja registrar o segundo ataque do atacante '.$indiceat.'?");\'>
			'.$InputAtkDois.'</form>'; 
		 } else {echo 'Aguardar';}
		 echo '</TD></TR>';
		 $indiceat++; 
		} ?>
	</TABLE>
		