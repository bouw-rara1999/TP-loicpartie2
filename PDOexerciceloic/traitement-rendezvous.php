    <?php 
        // Connect to the database

include('PDO.php'); 
        // Check if the information entered in index1.php already exists



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST['lastName']) && isset($_POST['firstName'])) {
            $checkPatient = $database->prepare("SELECT * FROM patients WHERE lastName = :lastName AND firstName = :firstName");
            $checkPatient->bindParam(':lastName', $_POST['lastName']);
            $checkPatient->bindParam(':firstName', $_POST['firstName']);
          
            $checkPatient->execute();
            $result = $checkPatient->fetchAll();
          
           

            if ($result) {
              // If the information already exists, add a date and time
             // Préparation de la requête de mise à jour
$updateQuery = $database->prepare("UPDATE patients SET dates = :newDate, heure = :newTime WHERE lastName = :lastName AND firstName = :firstName");

// Liaison des variables avec les paramètres
$updateQuery->bindParam(':newDate', $_POST['dates']);
$updateQuery->bindParam(':newTime', $_POST['heure']);
$updateQuery->bindParam(':lastName', $_POST['lastName']);
$updateQuery->bindParam(':firstName', $_POST['firstName']);

// Exécution de la requête
$updateQuery->execute();
 // Ajout de la nouvelle information
 echo "<tr>";
 echo "<td>" . $_POST['dates'] . "</td>";
 echo "<td>" . $_POST['heure'] . "</td>";
 echo "<td>" . $_POST['lastName'] . "</td>";
 echo "<td>" . $_POST['firstName'] . "</td>";
 echo "</tr>";
              echo "information trouvé! Votre rendez-vous a bien été prit en compte!";
              
            }
            else{
              echo "information introuvable, veuillez d'abord vous inscrire avant de prendre rendez-vous ou entrer une identité valide!";
            }
          }
        }
      ?>
