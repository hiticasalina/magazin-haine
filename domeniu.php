<?php

   session_start();
    include("conectare.php");
    include("page_top.php");
    include("meniu.php");
		$id_domeniu=$_GET['id_domeniu'];
		$sqlNumeDomeniu= "SELECT nume_domeniu FROM domenii WHERE id_domeniu= '$id_domeniu'";
		$resursaNumeDomeniu=mysql_query($sqlNumeDomeniu);
		$numeDomeniu = mysql_result($resursaNumeDomeniu,0,"nume_domeniu");
?>

<td valign="top">
	<h1>Domeniu:<?php $numeDomeniu?></h1>
	<b>Haine in domeniul<u><i>?=$numeDomeniu?></i></u>:</b>
	<table cellpadding="5">
	
	    <?php

			$sql ="SELECT id_haina , marime, pret, nume_categorie,nume_domeniu FROM haine,categorii,domenii WHERE haine.id_domeniu=domenii,id_domeniu
			AND haine.id_categorie=categorie.id_categorie
			AND domenii.id_domeniu='$id_domeniu'";
			$resursa=mysql_query($sql);
			while($row=mysql_fetch_array($resursa))

{
		?>
		<tr>
			<td align="center">
				<?php
					$adresaImagine="pozedomenii".$row['id_haina'].".jpg;
					if(file_exists($adresaImagine))
					{
					 
					}
					else{
		              print "<div style="width:75"height="100"><br>";
					}		  
				?>
		 </td>
            <td>
                <b><a href="haine.php?id_haina=<?php $row['id_haina'] ?>"><?= $row['domeniu'] ?></a></b><br><i>de <?= $row['nume_categorie']?></i><br> Pret: <?= $row['pret'] ?> lei
            </td>
        </tr>
           <!-- <?php } ?> -->
    </table>
</td>

<?php include ('page_bottom.php');
?>
		