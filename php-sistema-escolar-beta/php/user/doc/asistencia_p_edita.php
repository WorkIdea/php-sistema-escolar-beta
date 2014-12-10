<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral">
			<?php
				require_once("../../php_default.php");
					//echo "colegio: ".$_REQUEST['id_col']."<br>";
					//echo "anio: ".$_REQUEST['id_anio']."<br>";
					//echo "id_doc: ".$_REQUEST['id_doc']."<br>";
					//echo "id_alu: ".$_REQUEST['id_alu']."<br>";
					//echo "id_asig: ".$_REQUEST['id_asig']."<br>";
					//echo "id: ".$_REQUEST['asist']."<br>";
					//echo "id_fecha: ".$_REQUEST['id_fecha']."<br>";	

				$query="update asisten_asig_alu set asistio='$_REQUEST[asist]' 
						where idalu=$_REQUEST[id_alu] 
						and idasig=$_REQUEST[id_asig]
						and dia='$_REQUEST[id_fecha]'";
				//echo $query;
				mysql_query($query,$link) or die(mysql_error());
				echo "<center>El registro ha sido Actualizado. </center>";
			?>
			<center><a href='user_asig_asist_fecha.php?id_col=<?php echo $_REQUEST['id_col'];?>&id_anio=<?php echo $_REQUEST['id_anio'];?>&id_doc=<?php echo $_REQUEST['id_doc'];?>&id_asig=<?php echo $_REQUEST['id_asig'];?>&id_fecha=<?php echo $_REQUEST['id_fecha'];?>' id='linkEntra'> Volver</a></center>
		</div>
	</body>		
</html>