<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>
	</head>
	<body>
		<a href='profile_asig.php?id_col=<?php echo $_REQUEST['id_col'];?>&id_anio=<?php echo $_REQUEST['id_anio'];?>&id_doc=<?php echo $_REQUEST['id_doc'];?>&id_asig=<?php echo $_REQUEST['id_asig'];?>' id='linkEntra'><< Atras</a><br>
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
				<strong>Alumnos</strong>
				<blockquote>
				<?php
					/*echo $_REQUEST['id_col']."<br>";
					echo $_REQUEST['id_anio']."<br>";
					echo $_REQUEST['id_doc']."<br>";
					echo $_REQUEST['id_asig']."<br>";
					echo $query."<br>";*/

					require_once("../../php_default.php");
					$query="select * from alu_ae_colegio where idcol=$_REQUEST[id_col] and idanio=$_REQUEST[id_anio]";
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);								
					
					if ($totEmp>0) {
						echo "<table border=1>";			
						echo "<tr>";
						echo "<th colspan=2>Identificacion</th>";
						echo "<th>Nombre</th>";
						echo "<th>Lapso 1</th>";
						echo "<th>Lapso 2</th>";
						echo "<th>Lapso 3</th>";
						echo "<th>Definitiva</th>";
						echo "<th></th>";
						echo "</tr>";										
						while ($rowEmp = mysql_fetch_assoc($result)){
							$query="select * from usuario_info where idusu=".$rowEmp['idalu'];
							$result2=mysql_query($query, $link) or die(mysql_error());
							$row2=mysql_fetch_row($result2);							

							$query="select * from calif_asig_alu_lapso where idalu=$rowEmp[idalu] and idasig=$_REQUEST[id_asig]";
							$result3=mysql_query($query, $link) or die(mysql_error());

							//$row3=mysql_fetch_row($result3);
							$totEmp2=mysql_num_rows($result3);

							$lap1="";
							$lap2="";
							$lap3="";

							if ($totEmp2>0) {
								while ($rowEmp2 = mysql_fetch_assoc($result3)){
									if ($rowEmp2['idlap'] == 1){
										$lap1=$rowEmp2['calif'];
									}
									elseif ($rowEmp2['idlap'] == 2) {
										$lap2=$rowEmp2['calif'];
									}
									else{
										$lap3=$rowEmp2['calif'];
									}									
								}
							}
							//echo "$lap1 - $lap2 - $lap3 <br>";
	
							echo "<tr>";							
								echo "<td>".$row2[1]."</td>";
								echo "<td>".$row2[2]."</td>";
								echo "<td>".$row2[3]." ".$row2[4]."</td>";								
								echo "<td>$lap1</td>";
								echo "<td>$lap2</td>";
								echo "<td>$lap3</td>";
								$def =(($lap1+$lap2+$lap3)/3);
								$def2 = number_format($def,2,".",",");  

								echo "<td>".$def2."</td>";
								echo "<td><a href='calif_f_edita.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]&id_alu=$rowEmp[idalu]' id='LinkEdita'>Editar</a></td>";
							echo "</tr>";					
						}								
						echo "</table>";
						echo "<center><a href='user_asig_report_calif.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]'>Ver Reporte</a></center>";
					}
				?>	
				</blockquote>					
			</div>
		</div>			
	</body>		
</html>