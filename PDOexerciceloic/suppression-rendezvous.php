<?php 
include('PDO.php');

if(isset($_POST['action']) && $_POST['action'] == 'suppression-rendezvous.php'){
  try {
    $supp = $database->prepare('DELETE FROM patients WHERE dates = :Dates AND heure = :Heure LIMIT 1');

    $supp->bindparam(':Dates', $_POST['dates']);
    $supp->bindparam(':Heure', $_POST['heure']);
    $executeIsOk = $supp->execute(); 
    
    if ($executeIsOk) {
      echo "horaire supprimé!";
    } else {
      echo "erreur veuillez réassayer à nouveau!";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>
