<?php    
    require_once("lib/class.ezpdf.php");  
	$pdf = new Cezpdf('A4'); //seleccionamos tipo de hoja
	$pdf->selectFont('lib/fonts/Helvetica.afm'); //seleccionamos fuente a utiliza
/*============================================================================================*/
	$bd_host = "localhost"; //conexión localhost
    $bd_usuario = "root";  //nombre usuario
    $bd_password = ""; //contraseña
    $bd_base = "system_info"; //nombre Base de Datos
        //Hacemos la conexión y si no  mostramos error
    $con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error con la conexión");
        //Seleccionamos la Base de Datos de nuestra consulta anterior.
    mysql_select_db($bd_base, $con) or die("Error al seleccionar db");
        //escribimos nuestra consulta
    $sql="SELECT idcol,nomcol,direcol FROM colegio";
        //realizamos nuestra consulta
    $resSql=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());
/*============================================================================================*/
    $pdf->ezText("Reporte por Docente"."\n", 20);

        while($row=mysql_fetch_row($resSql)){

            $pdf->ezText("- ".$row[1]."\n", 10);

                $sql='select * FROM anio_escolar where idanio in(select idanio from ae_colegio where idcol='.$row[0].')';
                $resSql2=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());

                while($row2=mysql_fetch_row($resSql2)){
                    $pdf->ezText("      - ".$row2[1]."\n", 10);

                    $sql='select * FROM asignatura where idasig in(select idasig from asignatura_ae where idanio='.$row2[0].')';
                    $resSql3=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());

                    while($row3=mysql_fetch_row($resSql3)){

                        //$pdf->ezText("              - ".$row3[0]." - ".$row3[1]." - N/A"."\n", 10);       

                        //$row2[0] anio escolar
                        //$row3[0] materia codigo


                        /*$sql='select * from asignatura
                                where idasig in(select idasig from asignatura_ae where idanio='.$row2[0].')';*/

                        $sql='select * FROM usuario_info where idusu in(select iddoc from doc_asig_ae_colegio where idcol='.$row[0].' and idanio='.$row2[0].' and idasig='.$row3[0].')';
                        $result2=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error()); 
//
                                         
                        $resSql4=mysql_fetch_array($result2);     
                        $iRows=mysql_num_rows($result2);                 
                        if ($iRows==1){                                                             
                            //$pdf->ezText("              - ".$row3[1]." - ".$resSql4[3]." ".$resSql4[4]."\n", 10);                                                        
                            $nom = $resSql4[3]." ".$resSql4[4];
                            //$pdf->ezText($sql, 10);
                        }                                                
                        else{
                            //$pdf->ezText("              - ".$row3[1]." - N/A"."\n", 10);     
                            $nom="N/A"                       ;
                        }

                        $data[]=array('Asignatura'=>$row3[1], 'Profesor'=>$nom);                        
                    }

                    $pdf->ezTable($data);
                    //$data[]="";

                    unset($data);
                    $data = array();  
                    $pdf->ezText("\n", 10);

                }

            //la estructura será 'Nombre campo'=> posición del arreglo y la información
            //$data[]=array('ID'=>$row[0], 'Nombre del colegio'=>$row[1],'Direccion del colegio'=>$row[2]);
        }
		//$titles=array('Id'=>'Id', 'Nombre'=>'Nombre','Paterno'=>'Paterno','Materno'=>'Materno');
/*============================================================================================*/    
    $pdf->ezText("\n\n\n\nFecha: ".date("d/m/Y")."", 10);
    $pdf->ezText("Hora: ".date("H:i:s")."", 10);
    $pdf->ezStream();  
?>