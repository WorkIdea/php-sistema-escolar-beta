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
				<strong>Dias</strong>
				<blockquote>
				<?php
					/*echo $_REQUEST['id_col']."<br>";
					echo $_REQUEST['id_anio']."<br>";
					echo $_REQUEST['id_doc']."<br>";
					echo $_REQUEST['id_asig']."<br>";		*/			

					require_once("../../php_default.php");

					$query="select distinct dia,asistio from asisten_asig_alu 
								where idalu in (select idalu from alu_ae_colegio 
													where idcol=$_REQUEST[id_col] 
													  and idanio=$_REQUEST[id_anio])
								and idasig=$_REQUEST[id_asig] order by 1,2 desc";

					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);										

					if ($totEmp>0) {
						
							$fecha_anterior = "";							

						echo "<center><table border=1>";											
						while ($rowEmp = mysql_fetch_assoc($result)){														
							$fecha_actual = $rowEmp['dia'];
							$asis_actual = $rowEmp['asistio'];							

							if ($fecha_actual==$fecha_anterior){								
				
							}
							else{
								echo "<tr>";
								echo "<td>$rowEmp[dia]</td>";
								//echo "<td>$rowEmp2[cant]</td>";
								echo "<td><a href='user_asig_asist_fecha.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]&id_fecha=$rowEmp[dia]' id='LinkEdita'>Ver</a></td>";														
								echo "</tr>";												
							}			

							if ($asis_actual=='Z')				{
								break;
							}
							
							$fecha_anterior = $fecha_actual;	
						}
						echo "</table></center>";
					}
				?>	
				</blockquote>					
			</div>
		</div>			
	</body>		
</html>