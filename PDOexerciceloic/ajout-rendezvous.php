<!DOCTYPE html>
<html>
<head>
  <title>Ajout Rendezvous</title>
  <link rel="stylesheet" type="text/css" href="ajout-rendezvous-style.css">
</head>
<body>
  <h1>Ajout Rendezvous</h1>
  <form method="post" action="traitement-rendezvous.php">
    <label for="dates">Date:</label>
    <input type="date" id="dates" name="dates"><br><br>
    <label for="heure">Heure:</label>
    <input type="time" id="heure" name="heure"><br><br>
    <label for="lastName">Nom:</label>
    <input type="text" id="lastName" name="lastName"><br><br>
    <label for="firstName">Prénom:</label>
    <input type="text" id="firstName" name="firstName"><br><br>
    <input type="submit" value="Ajouter Rendezvous">
  </form>
</body>
</html>

