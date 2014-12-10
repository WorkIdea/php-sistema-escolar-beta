<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_rep.css" media="screen"/>		
	</head>
	<body>
		<a href='profile_alu.php?id_col=<?php echo $_REQUEST['id_col'];?>&id_rep=<?php echo $_REQUEST['id_rep'];?>&id_alu=<?php echo $_REQUEST['id_alu'];?>' id='linkEntra'><< Atras</a><br>
		<div class="DivGeneral">			
			<div class="DivInfoColegio">		
				<strong>Asistencias</strong>
				<blockquote>	
				<?php
					require_once("../../php_default.php");
					/*$query="select a.* from asignatura a,calif_asig_alu b
								where a.idasig=b.idasig
								and b.idalu=".$_REQUEST['id_alu'];*/
					$query="select * from asisten_asig_alu where idalu=$_REQUEST[id_alu] and idasig=$_REQUEST[id_asig] and asistio <> 'Z'";										
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);								
					
					if ($totEmp>0) {
						echo "<table border=1>";
						echo "<tr>";
						echo "<td>Dia</td>";
						echo "<td>¿Asistio?</td>";
						echo "</tr>";
						while ($rowEmp = mysql_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>$rowEmp[dia]</td>";
							echo "<td>$rowEmp[asistio]</td>";
							echo "</tr>";
						}	
						echo "</table>";						
					}else{
						echo "Sin registros generados.";
					}
				?>
				</blockquote>					
			</div>
		</div>		
	</body>
</html>					