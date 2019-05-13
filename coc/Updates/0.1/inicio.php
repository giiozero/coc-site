 <?PHP 
 if (isset($_COOKIE['nome'])){$login_cookie = $_COOKIE['nome'];} else {$login_cookie=null;}
 if (isset($_COOKIE['admin'])){$admin_cookie = $_COOKIE['admin'];}  else {$admin_cookie=null;}
 if (isset($_COOKIE['cla'])){$cla_cookie   = $_COOKIE['cla'];}  else {$cla_cookie=null;}
?>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour" - p/ mudar a cor do texto -->
          <h1><a href="?menu=inicio"><span class="logo_colour">Clans of Clash</span></a></h1>
          <h2>Sejam bem-vindos, chefes.</h2>
        </div>
      </div>
      <nav>
		<?PHP	
			include 'header.php';
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
       <!-- <div class="sidebar">
          <h3>Links Úteis</h3>
          <ul>
            <li><a href="#">First Link</a></li>
          </ul>
        </div>-->

      </div>
      <div class="content">
        <?PHP
			$menu = '';
			if (!empty($_GET['menu'])){
				$menu = $_GET['menu'];
			}
			if ($menu=='cadastrar'){
				include 'cadastro.html';
			} else if ($menu=='login'){
				include 'login.html';
			} else if ($menu=='logar'){
				include 'login.php';
			} else if (empty($login_cookie)) { // Se não estiver logado
				echo "<a href='?menu=login'>Conecte-se</a> ou <a href='?menu=cadastrar'>crie</a> sua conta  para saber se est&aacute; rolando alguma guerra.";
			}
			
			if (!empty($login_cookie)) { //Se estiver logado	
				if ($menu=='cadastre'){
					include 'cadastro.php';
				} else 	if ($menu =='inicio'){
				  include 'tbl_tropas.php';
				} else if ($menu=='sair'){
					setcookie("nome",null);
					setcookie("cla",null);
					header ("Location: ?menu=inicio"); 
				} else if ($menu=='novaguerra'){
					include 'novaguerra.php';
				} else if ($menu=='minions'){
					include 'tbl_tropas.php';
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

	