<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-acceso**");
} else { 
$e=$_SESSION['inicia'];
} /* Y cerramos el else */ 
echo "</div>";

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Control||Socios</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/script.js"></script>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<!--<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>-->
				<?php
                echo "<li class=\"v-sep\"><a href=\"#\" class=\"round button dark menu-user image-left\">Usuario <strong>$e</strong></a>";
				?>
					<ul>
						<li><a href="#">Mi cuenta</a></li>
						<li><a href="#">Configuraciones</a></li>
						<li><a href="#">Cambiar contraseña</a></li>
						<li><a href="close.php">Cerrar Sesion</a></li>
					</ul> 
				</li>
			
				<!--<li><a href="#" class="round button dark menu-email-special image-left">3 new messages</a></li>-->
				<li><a href="close.php" class="round button dark menu-logoff image-left">Salir</a></li>
				
			</ul> <!-- end nav -->

					
			<!--<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>-->

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
	
			
			<li><a href="panel.php" class="active-tab dashboard-tab">Socios</a></li>
				<li><a href="pagos.php">Pagos</a></li>
                <!--<li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="multiniv.php">Multinivel</a></li>
                <li><a href="level.php">Niveles</a></li>
                <li><a href="video.php">Video Promocional</a></li>
                <li><a href="estadisticas.php">Estadisticas</a></li>-->
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/logo.png" alt="biogym" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Menu</h3>
				<ul>
					<li><a href="newcomprador.php">Nuevo Cliente</a></li>
                    <li><a href="panelc.php">Regresar</a></li>
					
				</ul>
							
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Lista de Clientes-Inactivos</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> 
				<div class="content-module-main">

<table>
<thead>
<tr>
<th>Nombre</th>
<th>Teléfono</th>
<th>Email</th>
<th>Dirección</th>
<th>Membresia</th>
<th>Activar</th>
<th>Modificar</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>
<?php
include('connect.php');
  $query = "SELECT * FROM clientes where status=0 order by id_cliente desc ";
  $result = mysql_query($query);
  while($row = mysql_fetch_array($result))
  {

		 echo "<tr>";
		  echo "<td>",utf8_encode($row["nombre"]),"</td>";
		  echo "<td>",$row["telefono"],"</td>";
		  echo "<td>",$row["email"],"</td>";
		  echo "<td>",$row["direccion"],"</td>";
		  echo "<td>",$row["membresia"],"</td>";
		  echo "<td><a href=\"completarperfil.php?id=".$row['id_cliente']."\">Activar Comprador</a></td>";
		 echo "<td><a href=\"editcomprador.php?id=".$row['id_cliente']."\" class=\"table-actions-button ic-table-edit\"></a></td>";
		 echo "<td><a href=\"deletecomprador.php?id=".$row['id_cliente']."\" class=\"table-actions-button ic-table-delete\" onclick=\"return confirm('Borrar Comprador')\"></a></td>";
	
  }
 
 
      echo "</tr>";
  
  mysql_free_result($result);
  mysql_close($link);
?>
</tbody>
</table>
					</div> <!-- end content-module-main -->
				
				
	
				
				
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2014 <a href="#">Biogym</a>. Derechos Reservados.</p>
		<p><strong>Panel de control</strong>by<a href="http://appdt.info">AppDT28.6</a></p>
	
	</div> <!-- end footer -->
<script language="JavaScript" type="text/JavaScript">
function elegir() {
if (confirm('se borran los datos')) {
alert('borrar');
} else {
alert('no se borra nada');
}
}
</script>
</body>
</html>