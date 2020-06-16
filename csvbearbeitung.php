
<?php
//Dient zum anzeigen der Daten in einer Tabelle
 function showcsv($datei){

 $trenn = ";";
 $inhalt = fopen($datei, "r");
 
 echo("<table border=1>");
 
$zeile = fgetcsv($inhalt, 700,  $trenn);
	
		for($i = 0;$i < 16; $i++){
			
			$zellenkopf[$i] = htmlentities($zeile[$i]);

		}
			 echo("<tr>");
		for($i = 0;$i < 16; $i++){
			
			 echo ("<th>".$zellenkopf[$i]."</th>");
			
	
			
		}
		echo("</tr>");
		
	while($zeile = fgetcsv($inhalt, 200,  $trenn)){


		for($i = 0;$i < 20; $i++){
			
			if (isset($zeile[$i])) {
			$zelle[$i] = htmlentities($zeile[$i]);	
	}
			
		}
		 echo("<tr>");
		for($i = 0;$i < 20; $i++){
			
			if (isset($zelle[$i])) {
			 echo ("<td>".$zelle[$i]."</td>");
			}
			
		}
		echo("</tr>");
			
	}
		 echo("</table>");
		fclose($inhalt);
 }
//Dient zur erfassung der neuen Datensätze
function writecsv($datei){
	

	$trenn = ";";
	 
 $inhalt = fopen($datei, "r");
 echo("<form>");
 echo("<table border=1>");
 
$zeile = fgetcsv($inhalt, 700,  $trenn);
	
		for($i = 0;$i < 16; $i++){
			
			$zellenkopf[$i] = htmlentities($zeile[$i]);

		}
			 echo("<tr>");
		for($i = 0;$i < 16; $i++){
			
			 echo ("<th>".$zellenkopf[$i]."</th>");
				
		}
		echo("</tr>");
		echo("<tr>");
		
		for($i = 0;$i < 16; $i++){
			echo("<td>");
			echo("<input type='text' name='data$i' ><br>");
			echo("</td>");
		}
		echo("</tr>");

		echo("</table>");	
		echo("<input type='submit' name='auswahl' value='Eintragen'>");
		//echo("<input type="submit" name="auswahl" value="Eintragen" style="font-size:10pt" >")
		echo("</form>");
	
	
	fclose($inhalt);
}
//Dient zum schreiben der Daten
function writedatacsv($datei){
	
    $inhalt = fopen($datei,'a');	
	$daten = "";
 
	for($i = 0;$i < 16; $i++){
  
        $daten[$i] = $_POST['daten$i'];
        echo("test");
    }


    fputcsv($inhalt, $daten);


fclose($inhalt);	
	
}

//Dient zum anzeigen der Herstellerverteilung an Artikelmenge
 function showdiagramm($datei){

 $trenn = ";";
 $inhalt = fopen($datei, "r");
 $hersteller;

$zeile = fgetcsv($inhalt, 700,  $trenn);
	
		
	while($zeile = fgetcsv($inhalt, 200,  $trenn)){


		for($i = 0;$i < 20; $i++){
			
			if (isset($zeile[$i])) {
			$zelle[$i] = htmlentities($zeile[$i]);	
	}
			
		}
			
	//		if(isset($hersteller[0]){
				
	//		$hersteller[0] = $zelle[2]
	//		$hersteller[0][0] = 1;
	//		}else if(){
				
	//		}

	}

		fclose($inhalt);
 }






?>

<html>

<head>
<title>
CSV
</title>
</head>
<body>



<?php
	//if(null !==($_POST['auswahl'])){

	//}else{
	if($_POST['auswahl']=="Anzeigen"){
	showcsv("Artikel.csv");
	}else if($_POST['auswahl']=="Hinzufügen"){
	writecsv("Artikel.csv");
	}else if($_POST['auswahl']=="Diagramm"){
	showdiagramm("Artikel.csv");
	}else if($_POST['auswahl']=="Eintragen"){
	writedatacsv("Artikel.csv");
	}
//}
?>


</body>


</html>
