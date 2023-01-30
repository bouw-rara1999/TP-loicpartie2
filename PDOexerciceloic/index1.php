<?php
include ('PDO.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['lastname']) && isset($_POST['firstname'])) {
    $sql = $database->prepare("INSERT INTO patients (lastname, firstname, birthdate, mail, phone) VALUES (:Lastname, :Firstname, :Birthdate, :Mail, :Phone)");
    $sql->bindParam(':Lastname', $_POST['lastname']);
    $sql->bindParam(':Firstname', $_POST['firstname']);
    $sql->bindParam(':Birthdate', $_POST['birthdate']);
    $sql->bindParam(':Mail', $_POST['mail']);
    $sql->bindParam(':Phone', $_POST['phone']);

    try {
       $sql->execute();
      echo "Patient ajouté avec succès";
    } catch (PDOException $e) {
      echo "Erreur lors de l'ajout du patient: " . $e->getMessage();
    }
    
  }
}
?>






