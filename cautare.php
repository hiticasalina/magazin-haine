?php
    session_start();
    include ("conectare.php");
    include ('page_top.php');
    include ('meniu.php');
    $cuvant = $_GET['cuvant'];
?>

<td valign="top">
    <h1>Rezultatele cautarii</h1>
    <p>Textul cautat: <b><?= $cuvant ?></b></p>
    <b>Domeniul</b>
    <blockquote>
        <?php
            $sql = "SELECT id_categorie, nume_categorie FROM categorii WHERE nume_categorie LIKE '%". $cuvant ."%'";
            $resursa = mysql_query($sql);
            
            if (mysql_num_rows($resursa) == 0) {
                print "<i>Nici un rezultat</i>";
            }
            
            while ($row = mysql_fetch_array($resursa)) {
                $nume_categorie = str_replace($cuvant, "<b>$cuvant</b>", $row['nume_categorie']);
                print '<a href="categorie.php?id_categorie='. $row['id_categorie'] .'">'. $nume_categorie .'</a><br>';
            }
        ?>
    </blockquote>
    <b>Domenii</b>
    <blockquote>
        <?php
            $sql = "SELECT id_haina, domeniu FROM haine WHERE domeniu LIKE '%". $cuvant ."%'";
            $resursa = mysql_query($sql);
            
            if (mysql_num_rows($resursa) == 0) {
                print "<i>0 rezultate</i>";
            }
            
            while ($row = mysql_fetch_array($resursa)) {
                $titlu = str_replace($cuvant, "<b>$cuvant</b>", $row['domenii']);
                print '<a href="haina.php?id_haina='. $row['id_haina'] .'">'. $domeniu .'</a><br>';
            }
        ?>
    </blockquote>
    
</td>

<?php include ('page_bottom.php'); ?>