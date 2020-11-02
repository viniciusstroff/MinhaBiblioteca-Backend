
<?php 
include_once DIR_PERSISTENCIA . 'UsuariosDAO.class.php';

// $usuariosDAO = new UsuariosDAO();
// $usuarioLogado = $usuariosDAO->find($_SESSION['usuario_id']);

?>
<div class="dropdown" style="z-index: 2;">
	<nav >
		<ul class="menu">
			<li><a class="fa fa-bars fa-lg"href="#" style="color:white;"> Menu</a>
				<ul>
					
					<li><a href="GuiAutores.php">Lista de Autores</a></li>  
					<li><a href="GuiEditoras.php">Lista de Editoras</a></li>
					<li><a href="GuiGeneros.php">Lista de Genero</a></li> 
					<li><a href="GuiLivros.php">Lista de Livros</a></li>  
					<li><a href="GuiLivrosFavoritos.php">Lista de Livros Favoritos</a></li>  

					<?php if($usuarioLogado->getPerfil() != 'usuario'): ?>
						<li><a href="GuiUsuarios.php">Lista de Usuarios</a></li>
					<?php endif; ?>
					                           
				</ul>
			</li>             
		</ul>
	</nav>
</div>
