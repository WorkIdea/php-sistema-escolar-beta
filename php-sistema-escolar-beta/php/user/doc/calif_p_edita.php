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
				
				for ($i=1; $i < 4; $i++) { 					
					if ($i==1){
						$query="update calif_asig_alu_lapso set calif=$_REQUEST[calif1] where idalu=$_REQUEST[id_alu] and idasig=$_REQUEST[id_asig] and idlap=1";
						mysql_query($query,$link) or die(mysql_error());
					}elseif ($i==2) {
						$query="update calif_asig_alu_lapso set calif=$_REQUEST[calif2] where idalu=$_REQUEST[id_alu] and idasig=$_REQUEST[id_asig] and idlap=2";
						mysql_query($query,$link) or die(mysql_error());
					}else{
						$query="update calif_asig_alu_lapso set calif=$_REQUEST[calif3] where idalu=$_REQUEST[id_alu] and idasig=$_REQUEST[id_asig] and idlap=3";
						mysql_query($query,$link) or die(mysql_error());
					}

				}
								
				echo "<center>El registro ha sido Actualizado. </center>";
				echo "<center><a href='user_asig_calif.php?
										id_col=$_REQUEST[id_col]&
										id_anio=$_REQUEST[id_anio]&
										id_doc=$_REQUEST[id_doc]&
										id_asig=$_REQUEST[id_asig]'>Volver</a></center>";
			?>			
		</div>		
	</body>		
</html>