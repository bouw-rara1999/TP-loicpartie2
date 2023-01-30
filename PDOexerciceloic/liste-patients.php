<head>
  <link rel="stylesheet" type="text/css" href="liste-patients-style.css">
</head>
<?php
include "PDO.php";

$query = $database->prepare("SELECT id, lastname, firstname FROM patients");
$query->execute();
$patients = $query->fetchAll();
?>

<table>
  <tr>
    <th>ID</th>
    <th>Lastname</th>
    <th>Firstname</th>
  </tr>
  <?php foreach ($patients as $patient) { ?>
  <tr>
    <td><?= $patient["id"] ?></td>
    <td><a href="profil-patient.php?id=<?= $patient["id"] ?>"><?= $patient["lastname"] ?></a></td>
    <td><a href="profil-patient.php?id=<?= $patient["id"] ?>"><?= $patient["firstname"] ?></a></td>
  </tr>
  <?php } ?>
</table>
