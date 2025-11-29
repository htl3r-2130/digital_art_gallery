<?php
$currentLanguage = $_COOKIE['language'] ?? 'not set';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Preferences</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 id="header">User Language Preference</h1>

  <main>
    <p>Current language setting: <strong><?= $currentLanguage ?></strong></p>

    <form action="save-preferences.php" method="POST">
      <label for="language">Select language:</label>
      <select name="language" id="language">
        <option value="de">Deutsch</option>
        <option value="en">English</option>
      </select>
      <button type="submit">Save Preference</button>
    </form>

    <form action="save-preferences.php" method="POST">
      <input type="hidden" name="delete" value="true">
      <button type="submit">Delete Cookie</button>
    </form>
    <a href="index.php">Back to the gallery</a>
  </main>
</body>

</html>