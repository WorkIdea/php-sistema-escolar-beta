<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_rep.css" media="screen"/>
	</head>
	<body>
		<a href="user_alu_col.php?id_usu=<?php echo $_REQUEST['id_rep'];?>&id_col=<?php echo $_REQUEST['id_col'];?>" id="linkAtras"><< Atras</a><br>
		<div class="DivGeneral">
			<!---->			
			<div class="DivInfoUser">				
				<strong>Datos del Alumno</strong>
				<blockquote>
				<?php
					require_once("../../php_default.php");
					$query="select * from usuario_info where idusu=".$_REQUEST['id_alu'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$row=mysql_fetch_row($result);

					echo "Identificacion: ".$row[1]." - ".$row[2]."<br>";
					echo "Nombre: ".$row[3]." ".$row[4]."<br>";
					echo "Direccion: ".$row[5]."<br>";
				?>
				</blockquote>
			</div>
			<!---->			
			<div class="DivInfoColegio">
				<strong>Opciones</strong>				
				<center><blockquote>					
				<?php
					echo "<a href='user_alu_calif.php?id_col=$_REQUEST[id_col]&id_rep=$_REQUEST[id_rep]&id_alu=$row[0]'>Calificaciones</a><br>";
					echo "<a href='user_alu_asist.php?id_col=$_REQUEST[id_col]&id_rep=$_REQUEST[id_rep]&id_alu=$row[0]'>Asistencias</a><br>";
					//echo "<a href='user_alu_report_calif.php?id_col=$_REQUEST[id_col]&id_rep=$_REQUEST[id_rep]&id_alu=$row[0]'>Reporte de Calificacion</a><br>";
				?>
				</blockquote></center>
			</div>
			<!---->							
			</div>			
		</div>			
	</body>		
</html>			