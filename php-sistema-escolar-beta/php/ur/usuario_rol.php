<?php
	require_once("../php_default.php");
	$query="select * from usuario_info where idusu=$_REQUEST[id_usu]";	
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);	  	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Rol de Usuario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_rol.css" media="screen"/>		
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">				
				<a href="../ui/usuario_info.php" id="linkAtras">Atras</a>
				<strong>Rol de Usuario</strong>
				<a href="usuario_rol_f_agrega.php?id_usu=<?php echo $_REQUEST['id_usu'];?>" id='linkAgrega'>Agregar</a><br>
			</div>			
			<!---->				
			<div class="DivPanelData">			
				<?php
					echo "<table border=1>";
					echo "<tr>";
					echo "<td>ID</td>";
					echo "<td>Nombre y Apellido</td>";						
					/*echo "<td></td>";*/
					echo "<td>Roles</td>";			
					echo "<td></td>";
					echo "</tr>";

					$query="select * from usuario_rol where idusu=".$row[0]." order by 1";
					$result2=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result2);						

					echo "<tr>";
					echo "<td rowspan=".($totEmp+1).">".$row[0]."</td>";
					echo "<td rowspan=".($totEmp+1).">".$row[3]." ".$row[4]."</td>";
										
					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result2)){
							$query="select * from tab_central where tipotab='ROLUSU' and codtab='".$rowEmp['rolusu']."'";
							$result3=mysql_query($query, $link) or die(mysql_error());
							$row2=mysql_fetch_row($result3);		
							echo "<tr>";
							echo "<td>".$row2[2]."</td>";
							echo "<td>"."<a href='usuario_rol_f_borra.php?id_usu=$row[0]&rol_usu=$rowEmp[rolusu]' id='LinkBorra'>Borrar</a></td>";										
							echo "</tr>";
						}
						echo "</tr>";	
					}
					else if($totEmp==0){
						/*echo "<tr>";*/
						echo "<td>No tiene roles</td>";
						echo "<td>##############</td>";
						/*echo "</tr>";*/
						echo "</tr>";
					}
					echo "</table>";
				?>
			</div>
			<!---->						
		</div>
	</body>			
</html>