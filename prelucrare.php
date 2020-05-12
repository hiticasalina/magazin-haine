<?php
    if ($_POST['nume'] == '') {
        print 'Numele dumneavoastră! <a href="cos.php">Inapoi</a>';
        exit;
    }
    if ($_POST['adresa'] == '') {
        print 'Adresa dumneavoastră! <a href="cos.php">Inapoi</a>';
        exit;
    }
    
    session_start();
    $nrCarti = array_sum($_SESSION['nr_buc']);
    
    if ($nrCarti == 0) {
        print 'Trebuie sa cumparati cel putin o haină! <a href="cos.php">Inapoi</a>';
        exit;
    }
    
    include ("conectare.php");
    
    $sqltranzactie = "INSERT INTO tranzactii(nume_cumparator, adresa_cumparator) VALUES('". $_POST['nume'] ."','". $_POST['adresa'] ."')";
    $resursaTranzactie = mysql_query($sqltranzactie);
    $id_tranzactie = mysql_insert_id();
    
    for($i = 0; $i < count($_SESSION['id_haina']); $i++) {
        if($_SESSION['nr_buc'][$i] > 0) {
            $sqlVanzare = "INSERT INTO vanzari VALUES('". $id_tranzactie ."','". $_SESSION['id_haina'][$i] ."','". $_SESSION['nr_buc'][$i] ."')";
            mysql_query($sqlVanzare);
        }
    }
    
    $emailDestinatar = 'alina.cadis@zahoo.ro';
    $subiect = "O noua comanda!";
    $mesaj = "O noua comanda de la <b>". $_POST['nume']. "</b><br>";
    $mesaj .= "Adresa: ". $_POST['adresa'] ."<br>";
    $mesaj .= "Produse comandate:<br><br>";
    $mesaj .= "<table border='1' cellspacing='0' cellpadding='4'>";
    $totalGeneral = 0;

    for($i = 0; $i < count($_SESSION['id_haina']); $i++) {
        if($_SESSION['nr_buc'][$i] > 0) {
            $mesaj .= "<tr><td>". $_SESSION['domeniu'][$i] ." de ". $_SESSION['nume_categorie'][$i] ."</td><td>". $_SESSION['nr_buc'][$i] ." buc</td></tr>";
            $totalGeneral += ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]); 
        }
    }
    
    $mesaj .= "</table>";
    $mesaj .= "Total: <b>". $totalGeneral ."</b>";
    $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-2\r\n";
   
    session_unset();
    session_destroy();
    
    include ('page_top.php');
    include ('meniu.php');
?>

<td valign="top">
    <h1>Multumim!</h1>
    Va multumim ca ati cumparat de la noi! Comanda dumneavoastră va ajunge la destinatie in max 48h.
</td>

<?php include ('page_bottom.php'); ?>