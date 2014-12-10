<!DOCTYPE HTML>
<html>		
	<head>
		<title>Usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_info.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">				
				<a href="../admin.php" id="linkAtras">Atras</a>
				<strong>Registro de Usuarios</strong>
				<a href="usuario_info_f_agrega.php" id="linkAgrega">Agregar</a><br>
			</div>
			<!---->			
			<div class="DivPanelData">
				<?php					
					echo "<table border=1>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th colspan=2>Identificacion</th>";
					echo "<th>Nombre</th>";
					echo "<th>Apellido</th>";
					echo "<th>Direccion</th>";
					echo "<th>Roles</th>";
					echo "<th colspan=3>Acciones</th>";
					echo "</tr>";
					
					require_once("../php_default.php");
					$query="select * from usuario_info order by 1";
   					$result=mysql_query($query, $link) or die(mysql_error());
   					$totEmp=mysql_num_rows($result);  									

					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result)){							
							$query="select * from usuario_rol where idusu=$rowEmp[idusu]";
							$result2=mysql_query($query, $link) or die(mysql_error());
							$totEmp2=mysql_num_rows($result2);
							echo "<tr>";
							echo "<td>$rowEmp[idusu]</td>";
							echo "<td>$rowEmp[tipoid]</td>";
							echo "<td>$rowEmp[numid]</td>";
							echo "<td>$rowEmp[nomusu]</td>";
							echo "<td>$rowEmp[apeusu]</td>";
							echo "<td>$rowEmp[direcusu]</td>";
							echo "<td><a href='../ur/usuario_rol.php?id_usu=$rowEmp[idusu]' id='Link'>Ver ($totEmp2)</a></td>";
							echo "<td><a href='usuario_info_f_edita.php?id_usu=$rowEmp[idusu]' id='LinkEdita'>Editar</a></td>";
							echo "<td><a href='usuario_info_f_borra.php?id_usu=$rowEmp[idusu]' id='LinkBorra'>Borrar</a></td>";
							echo "</tr>";
						}	
					}
					echo "</table>";
					echo "<center><a href='../a_r/alu_rep.php' id='linkAluRep'><strong>Alumnos/Representante</strong></a></center>";
				?>						
			</div>
			<!---->			
		</div>
	</body>		
</html>