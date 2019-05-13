 <?PHP 
 if (isset($_COOKIE['nome'])){$login_cookie = $_COOKIE['nome'];} else {$login_cookie=null;}
 if (isset($_COOKIE['admin'])){$admin_cookie = $_COOKIE['admin'];}  else {$admin_cookie=null;}
 if (isset($_COOKIE['cla'])){$cla_cookie   = $_COOKIE['cla'];}  else {$cla_cookie=null;}
?>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <h1><a href="?menu=inicio"><span class="logo_colour">Clans of Clash</span></a></h1>
          <h2>Sejam bem-vindos, chefes.</h2>
        </div>
      </div>
      <nav>
		<?PHP	
			include 'menus.php';
		?>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Últimas Atualizações</h3>
          <h4>Site publicado</h4>
          <h5>26 de Junho de 2015</h5>
          <p>Deixem suas dicas no Whatsapp/ Facebook do clã. Qualquer crítica também será bem-vinda.</p>
        </div>
      </div>
      <div class="content">
        <?PHP
			$menu = '';
			
			//Guardar o MENU em uma variável
			if (!empty($_GET['menu'])){
				$menu = $_GET['menu'];
			} else { // Se não houver MENU no Link, enviar para MENU=INICIO
				header ("Location: ?menu=inicio"); 
			}
			if (!empty($login_cookie)) { //Se estiver logado	
				switch ($menu) {
					case 'inicio';
						include 'tropas_conteudo.php';
					break;
					case 'guerra';
						include 'guerra.php';
					break;
					case 'novaguerra';
						include 'guerra_nova.php';
					break;
					case 'minions';
						include 'tbl_tropas.php';
					break;
					case 'sair';
						setcookie("nome",null);
						setcookie("cla",null);
						header ("Location: ?menu=inicio"); 
					break;
					default;
						header ("Location: ?menu=inicio"); 
					break;
				}
			} else { //Se não estiver logado
				switch ($menu) {
					case 'cadastrar';#++CADASTRE-
						include 'cadastro.html';
					break;
					case 'cadastre';#++CADASTRAR-
						include 'cadastro.php';
					break;
					case 'login';#++LOGAR+
						include 'login.html';
					break;
					case 'logar';#++LOGIN+
						include 'login.php';
					break;
					default;
						echo "<a href='?menu=login'>Conecte-se</a> ou <a href='?menu=cadastrar'>crie</a> sua conta  para saber se est&aacute; rolando alguma guerra.";
					break;
				}
			}
            
        ?>
      </div>
    </div>
	<?PHP 
		include 'footer.php';
	?>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>

	