<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result);
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Representantes/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_rep_colegio.css" media="screen"/>		
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../c/colegio.php" id="linkAtras">Atras</a>
				<strong>Registro de Representantes/Colegio</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">						
				<?php
					if ($totEmp>0){
						echo "<table border=1>";
						echo "<tr>";
						echo "<td>ID</td>";
						echo "<td>Colegio</td>";
						echo "<td></td>";
						echo "<td colspan=2>Identificacion</td>";
						echo "<td>Nombre y Apellido</td>";
						echo "<td></td>";
						echo "</tr>";
						while ($rowEmp = mysql_fetch_assoc($result)){									
						 	$query="select * from rep_colegio where idcol=".$rowEmp['idcol']." order by 2";
							$result2=mysql_query($query, $link) or die(mysql_error());
   							$totEmp2=mysql_num_rows($result2);							
							echo "<tr>";
							echo "<td rowspan=".($totEmp2+1).">".$rowEmp['idcol']."</td>";
							echo "<td rowspan=".($totEmp2+1).">".$rowEmp['nomcol']."</td>";
							echo "<td rowspan=".($totEmp2+1)."><a href='rep_colegio_f_agrega.php?id_col=$rowEmp[idcol]' id='linkAgrega'>Agregar</a></td>";
							echo "</tr>";	
							if ($totEmp2>0){
								while ($rowEmp2 = mysql_fetch_assoc($result2)){
									$query="select ui.idusu,ui.tipoid,ui.numid,ui.nomusu,ui.apeusu from usuario_info ui
												where exists
													(select 1 from rep_colegio rc
														where rc.idrep=ui.idusu
														and rc.idcol=".$rowEmp2['idcol'].")
												and idusu=".$rowEmp2['idrep'];
									$result3=mysql_query($query, $link) or die(mysql_error());
									$row=mysql_fetch_row($result3);
											
									echo "<tr>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[2]."</td>";
									echo "<td>".$row[3]." ".$row[4]."</td>";
									echo "<td>"."<a href='rep_colegio_f_borra.php?id_col=$rowEmp[idcol]&id_usurep=$row[0]' id='LinkBorra'>Borrar</a></td>";
									echo "</tr>";	 					
								}	
							}
						}	
						echo "</table>";	
					}
				?>
			</div>
			<!---->						
		</div>
	</body>		
</html>