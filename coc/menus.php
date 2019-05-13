<div id="menu_container">
	<ul class="sf-menu" id="nav">
		<li>
			<a href="?menu=inicio">Home</a>
		</li>
	</ul>
</div>
<?PHP if(isset($login_cookie)){ ?>
<div id="menu_container">
	<ul class="sf-menu" id="nav">
		<li>
			<a href="?menu=guerra">Guerras</a>
		</li>
	</ul>
</div>
<div id="menu_container">
	<ul class="sf-menu" id="nav">
		<li>
			<a href="?menu=minions">Tropas</a>
		</li>
	</ul>
</div>
<?PHP } ?>
 <div id="menu_container" >
	<ul class="sf-menu" id="nav" style="float:right;">
<?PHP 
		if(isset($login_cookie)){
			echo"<li><a href='#'>$login_cookie</a>
			<ul><li><a href='?menu=sair'>Sair</a></li></ul></li>";
		} else {
			echo '<li><a href="?menu=login">Login</a></li> <br>';
		}
?>
	</ul>
</div>