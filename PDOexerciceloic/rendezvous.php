<!-- traitement-rendezvous.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Liste des rendez-vous</title>
  <link rel="stylesheet" type="text/css" href="traitement-rendezvous-style.css">
</head>
<body>
  <h1>Liste des rendez-vous</h1>
  <a href="ajout-rendezvous.php">Ajouter un rendez-vous</a>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Heure</th>
        <th>Nom du patient</th>
        <th>Prénom du patient</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include('PDO.php'); 
      $query = $database->prepare("SELECT * FROM patients");
      $query->execute();
      $result = $query->fetchAll();
      foreach($result as $row){
        echo "<tr>";
        echo "<td>" . $row['dates'] . "</td>";
        echo "<td>" . $row['heure'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<form action='suppression-rendezvous.php' method='post'>";
        echo "<input type='hidden' name='dates' value='" . $row['dates'] . "'>";
        echo "<input type='hidden' name='heure' value='" . $row['heure'] . "'>";
        echo "<input type='hidden' name='action' value='suppression-rendezvous.php'>";
        echo "<td><input type='submit' name='suppression-rendezvous' value='Supprimer'></td>";
        echo "</form>";
        echo "</tr>";
      }
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
</tbody>
  </table> 
</body>
</html>
