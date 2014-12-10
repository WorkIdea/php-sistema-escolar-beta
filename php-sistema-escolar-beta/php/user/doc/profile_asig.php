<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>
	</head>
	<body>
		<a href="user_col_asig.php?id_usu=<?php echo $_REQUEST['id_doc'];?>&id_col=<?php echo $_REQUEST['id_col'];?>" id="linkAtras"><< Atras</a><br>
		<div class="DivGeneral">
			<!---->			
			<div class="DivInfoUser">				
				<strong>Datos de Asignatura</strong>
				<blockquote>
				<?php
					require_once("../../php_default.php");
					$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$row=mysql_fetch_row($result);
					
					echo "Nombre: ".$row[1]."<br>";					
				?>
				</blockquote>
			</div>
			<!---->			
			<div class="DivInfoColegio">
				<strong>Opciones</strong>
				<center><blockquote>					
				<?php
					echo "<a href='user_asig_calif.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]'>Calificaciones</a><br>";
					echo "<a href='user_asig_asist.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]'>Asistencia</a><br>";
					echo "<a href='user_asig_estudiantes.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]'>Lista Escolar</a><br>";
				?>
				</blockquote></center>
			</div>
			<!---->							
			</div>			
		</div>	
	</body>		
</html		