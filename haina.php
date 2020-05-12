<?php
    session_start();
    include ("conectare.php");
    include ('page_top.php');
    include ('meniu.php');

    $id_haina = $_GET['id_haina'];
    $sql = "SELECT domeniu, nume_categorie, marime, pret FROM haine, categorii WHERE id_haina=". $id_haina ." AND haine.id_categorie=categorii.id_categorie";
    $resursa = mysql_query($sql);
    $row = mysql_fetch_array($resursa);
?>

<td valign="top">
    <table>
        <tr>
            <td valign="top">
                <?php 
                    $adresaImagine = "pozedomenii". $id_haina .".jpg";
    
                    if (file_exists($adresaImagine)) {
                        print '<img src="'. $adresaImagine .'" width="75" height="100"><br>';
                    }
                ?>
            </td>
            <td valign="top">
                <h1><?= $row['domenii'] ?></h1>
                <i>de <b><?= $row['nume_categorie'] ?></b></i>
                <p><i><?= $row['marime'] ?></i></p>
                <p>Pret: <?= $row['pret'] ?> lei</p>
            </td>
        </tr>
    </table>
    
    <form action="cos.php?actiune=adauga" method="POST">
        <input type="hidden" name="id_haina" value="<?= $id_haina ?>">
        <input type="hidden" name="domeniu" value="<?= $row['domeniu'] ?>">
        <input type="hidden" name="nume_ctegorie" value="<?= $row['nume_categorie'] ?>">
        <input type="hidden" name="pret" value="<?= $row['pret'] ?>">
        <input type="submit" value="Cumpara acum!">
    </form>
    
    
</td>


