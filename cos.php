<?php
    session_start();
    include ("conectare.php");
    include ('page_top.php');
    include ('meniu.php');

    if (isset($_GET['actiune']) && $_GET['actiune'] == 'adauga') {
        $_SESSION['domeniu'][] = $_POST['domeniu'];
        $_SESSION['nume_categorie'][] = $_POST['nume_categorie'];
        $_SESSION['id_haina'][] = $_POST['id_haina'];
		 $_SESSION['marime'][] = $_POST['marime'];
        $_SESSION['pret'][] = $_POST['pret'];
        $_SESSION['nr_buc'][] = 1;
    }
    if (isset($_GET['actiune']) && $_GET['actiune'] == 'modifica') {
        for($i=0; $i<count($_SESSION['id_haina']); $i++) {
            if (isset($_POST['noulNrBuc'][$i])) {
                $_SESSION['nr_buc'][$i] = $_POST['noulNrBuc'][$i];
            }
        }
        //redirect pt a actualiza nr de haine din meniul lateral
        header("location: cos.php");
    }
?>

<td valign="top">
    <h1>Cosul de cumparaturi</h1>
    <form action="cos.php?actiune=modifica" method="POST">
        <table border="1" cellpspacing="0" cellpadding="4">
            <tr bgcolor="#F9F1E7">
                <td><b>Nr. buc</b></td>
                <td><b>Haină</b></td>
                <td><b>Pret</b></td>
                <td><b>Total</b></td>
            </tr>
            <?php
                $totalGeneral = 0;
                
                if (isset($_SESSION['id_haina'])) {
                    for($i = 0; $i < count($_SESSION['id_haina']); $i++) {
                        if ($_SESSION['nr_buc'][$i] != 0) {
                            print '<tr><td><input type="text" name="noulNrBuc['.$i.']" size="1" value="'. $_SESSION['nr_buc'][$i] .'"></td>'
                                    . '<td><b>'. $_SESSION['domeniu'][$i] .'</b> de '. $_SESSION['nume_categorie'][$i] .'</td>'
                                    . '<td align="right">'. $_SESSION['pret'][$i] .' lei</td>'
                                    . '<td align="right">'. ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]) .' lei</td></tr>';

                            $totalGeneral += ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]); 
                        }
                    }
                }
                print'<tr><td align=right" colspan="3"><b>Total in cos</b></td><td align="right"><b>'. $totalGeneral .'</b> lei</td></tr>';
            ?>
        </table>
        <input type="submit" value="modifica"><br><br>
        Introducti <b>0</b> pentru hainele ce doriti sa le scoateti din cos!
        <h1>Continuare</h1>
        
        <table>
            <tr>
                <td width="200" align="center"><img src="cos.png" style="width: 20px;"><a href="index.php">Continua cumparaturile</a></td>
                <td width="200" align="center"><img src="casa.jpg" style="width: 20px;"><a href="casa.php">Mergi la casa</a></td>
            </tr>
        </table>
    </form>
</td>

<?php include ('page_bottom.php'); ?>