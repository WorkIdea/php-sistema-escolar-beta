<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Año Escolar/Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_ae_colegio.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral2">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					$query="select * from asignatura_ae a 
								where exists(select 1 from ae_colegio b
												where b.idanio=a.idanio) and idanio=".$_REQUEST['idanio'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);

					if ($totEmp>0){														
						while ($rowEmp = mysql_fetch_assoc($result)){	
							for ($i=1; $i < 4; $i++) { 
								$query="insert into calif_asig_alu_lapso (idalu,idasig,idlap,calif) values($_REQUEST[idalu],$rowEmp[idasig],$i,0)";
								mysql_query($query,$link) or die(mysql_error());
							}				
						}
					}

					$query="select * from asignatura_ae a 
								where exists(select 1 from ae_colegio b
												where b.idanio=a.idanio) and idanio=".$_REQUEST['idanio'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);

					if ($totEmp>0){							
						$query="select * from periodo_escolar where idperi=1";
			   			$result2=mysql_query($query, $link) or die(mysql_error());
			   			$row2=mysql_fetch_row($result2);	  

						while ($rowEmp = mysql_fetch_assoc($result)) {
							$fec_desde = $row2[2];
							$datetime1 = date_create("$row2[2]");
							$datetime2 = date_create("$row2[3]");
							$interval = date_diff($datetime1, $datetime2);
							$dias =$interval->format('%a');
							$i=0;

							while ($i<=$dias) {
								$nuevafecha = strtotime('+'.$i.' day',strtotime($fec_desde));	
								$nuevafecha = date('Y-m-j',$nuevafecha);
								$query="insert into asisten_asig_alu (idalu,idasig,dia,asistio) values($_REQUEST[idalu],$rowEmp[idasig],'".$nuevafecha."','Z')";
								mysql_query($query,$link) or die(mysql_error());
								$i++;
							}
						}
					}
					
					$query="insert into alu_ae_colegio values ($_REQUEST[idcol],$_REQUEST[idanio],$_REQUEST[idalu])";
					mysql_query($query,$link) or die(mysql_error());	
					echo "<center>El registro ha sido Agregado. </center>";				
					echo "<center><a href='alu_ae_colegio.php?id_col=$_REQUEST[idcol]'>Volver</a></center>";
				?>				
			</div>
		</div>
	</body>		
</html>