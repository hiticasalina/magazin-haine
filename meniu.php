<td valign="top" width="125">
<div style="width:120px; background-color:#F9F1E7; padding:4px; border:solid #632415 1px">
<b> Alege domeniul</b><HR size="1">
<?
$sql= "SELECT *FROM domenii ORDER BY nume_domeniu ASC";
$resursa=mysql_query($sql);

while($row=mysqlfetch_array($resursa))
	{print '<a href="domeniu.php?
      id_domeniu='.$row['id_domeniu'].
	  '">'.$row['nume_domeniu'].
	  '</a><br>';
	}
?>
</div>
<br>
<div style="width:120px;
background-color:#F9F1E7;
padding:4px; border:solid#632415 1px">
<form action="cautare.php"
method= "GET">
<b>Căutare</b><br<
<INPUT type="text" name="cuvant"
size="12"><br>
<INPUT type="submit" value="Caută">
</form>
</div>
</td>
	