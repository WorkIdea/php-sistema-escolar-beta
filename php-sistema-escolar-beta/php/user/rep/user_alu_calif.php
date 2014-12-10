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
				<strong>Calificaciones</strong>
				<blockquote>	
				<?php
					require_once("../../php_default.php");

					$query="select * from asignatura
								where idasig in (select distinct idasig from calif_asig_alu_lapso
													where idalu=".$_REQUEST['id_alu'].")";

					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);										
					
					if ($totEmp>0) {
						echo "<table>";	
						echo "<tr>";
						echo "<th>Asignatura</th>";
						echo "<th>Lapso 1</th>";
						echo "<th>Lapso 2</th>";
						echo "<th>Lapso 3</th>";
						echo "<th>Definitiva</th>";
						echo "</tr>";												
						while ($rowEmp = mysql_fetch_assoc($result)){
							$query="select * from calif_asig_alu_lapso where idalu=$_REQUEST[id_alu] and idasig=$rowEmp[idasig]";
							$result5=mysql_query($query, $link) or die(mysql_error());
							$totEmp2=mysql_num_rows($result5);

							$lap1="";
							$lap2="";
							$lap3="";

							if ($totEmp2>0) {
								while ($rowEmp2 = mysql_fetch_assoc($result5)){
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
							$def =(($lap1+$lap2+$lap3)/3);
							$def2 = number_format($def,2,".",","); 	

							echo "<tr>";
								echo "<td>".$rowEmp['nomasig']."</td>";
								echo "<td>$lap1</td>";
								echo "<td>$lap2</td>";
								echo "<td>$lap3</td>";								
								echo "<td>$def2</td>";	
							echo "</tr>";		
						}	
						echo "</table>";
						echo "<center><a href='user_alu_report_calif.php?id_col=$_REQUEST[id_col]&id_rep=$_REQUEST[id_rep]&id_alu=$_REQUEST[id_alu]'>Ver Reporte</a></center>";
					}	
				?>			
				</blockquote>					
			</div>
		</div>
	</body>
</html>			