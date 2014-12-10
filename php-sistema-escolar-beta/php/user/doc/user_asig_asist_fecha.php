<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>		
	</head>
	<body>
		<a href='user_asig_asist.php?id_col=<?php echo $_REQUEST['id_col'];?>&id_anio=<?php echo $_REQUEST['id_anio'];?>&id_doc=<?php echo $_REQUEST['id_doc'];?>&id_asig=<?php echo $_REQUEST['id_asig'];?>' id='linkEntra'><< Atras</a><br>
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
					echo "Fecha: ".$_REQUEST['id_fecha']."<br>";					
				?>
				</blockquote>
			</div>
			<!---->			
			<div class="DivInfoColegio">		
				<?php
					require_once("../../php_default.php");
					$query="select a.idalu,b.tipoid,b.numid,b.nomusu,b.apeusu,a.asistio,a.dia from asisten_asig_alu a,usuario_info b 
							where a.idalu=b.idusu
							and idasig=$_REQUEST[id_asig] 
							and dia='$_REQUEST[id_fecha]'
							and idalu in(select idalu from alu_ae_colegio 
											where idcol=$_REQUEST[id_col]
											and idanio=$_REQUEST[id_anio])";
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);
					if ($totEmp>0) {
						echo "<table border=1>";			
						echo "<tr>";
						echo "<th colspan=2>Identificacion</th>";
						echo "<th>Nombre</th>";
						echo "<th>Apellido</th>";
						echo "<th>¿Asistio?</th>";						
						echo "<th>Acciones</th>";	
						echo "</tr>";										
						while ($rowEmp = mysql_fetch_assoc($result)){	
							echo "<tr>";							
								echo "<td>".$rowEmp['tipoid']."</td>";
								echo "<td>".$rowEmp['numid']."</td>";
								echo "<td>".$rowEmp['nomusu']."</td>";
								echo "<td>".$rowEmp['apeusu']."</td>";
								if ($rowEmp['asistio']=='Z'){
									$rowEmp['asistio'] = '-';
								}
								echo "<td>".$rowEmp['asistio']."</td>";
								echo "<td><a href='asistencia_f_edita.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_alu=$rowEmp[idalu]&id_asig=$_REQUEST[id_asig]&id_fecha=$rowEmp[dia]&id_asis=$rowEmp[asistio]' id='LinkEdita'>Cambiar</a></td>";
								/*
									id_col=$_REQUEST[id_col]&
									id_anio=$_REQUEST[id_anio]&
									id_doc=$_REQUEST[id_doc]&
									id_asig=$row[0]&
									id_fecha=$rowEmp2[dia]
								*/
							echo "</tr>";							
						}								
						echo "</table>";
						echo "<center><a href='user_asig_report_asist_fecha.php?id_col=$_REQUEST[id_col]&id_anio=$_REQUEST[id_anio]&id_doc=$_REQUEST[id_doc]&id_asig=$row[0]&id_fecha=$_REQUEST[id_fecha]' id='LinkEdita'>Ver Reporte</a></center>";
					}
				?>
			</div>
		</div>
	</body>		
</html>