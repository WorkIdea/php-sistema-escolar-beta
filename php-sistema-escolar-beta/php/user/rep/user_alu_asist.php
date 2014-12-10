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
					$query="select a.* from asignatura a,calif_asig_alu b
								where a.idasig=b.idasig
								and b.idalu=".$_REQUEST['id_alu'];

					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);								
					
					if ($totEmp>0) {
						echo "<table>";						
						while ($rowEmp = mysql_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>$rowEmp[nomasig]</td>";
							echo "<td><a href='user_alu_asist_asig.php?id_col=$_REQUEST[id_col]&id_rep=$_REQUEST[id_rep]&id_alu=1&id_asig=$rowEmp[idasig]'>Ver</a></td>";
							//echo "<td>".$rowEmp['calif']."</td>";
							echo "</tr>";		
						}	
						echo "</table>";						
					}
				?>
				</blockquote>					
			</div>
		</div>		
	</body>
</html>			