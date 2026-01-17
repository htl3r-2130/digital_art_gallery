<?php
$currentLanguage = $_COOKIE['language'] ?? 'de';

// Textbausteine
$text = [
    'en' => [
        'title' => 'User Language Preference',
        'current' => 'Current language setting',
        'select' => 'Select language:',
        'save' => 'Save Preference',
        'delete' => 'Delete Cookie',
        'back' => 'Back to the gallery',
    ],
    'de' => [
        'title' => 'Spracheinstellungen',
        'current' => 'Aktuelle Spracheinstellung',
        'select' => 'Sprache auswählen:',
        'save' => 'Einstellung speichern',
        'delete' => 'Cookie löschen',
        'back' => 'Zurück zur Galerie',
    ],
];

$t = $text[$currentLanguage] ?? $text['de'];
?>
<!DOCTYPE html>
<html lang="<?= $currentLanguage ?>">

<head>
    <meta charset="UTF-8">
    <title><?= $t['title'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1 id="header"><?= $t['title'] ?></h1>

<main>
    <p><?= $t['current'] ?>: <strong><?= $currentLanguage ?></strong></p>

    <form action="save-preferences.php" method="POST">
        <label for="language"><?= $t['select'] ?></label>
        <select name="language" id="language">
            <option value="de" <?= $currentLanguage == 'de' ? 'selected' : '' ?>>Deutsch</option>
            <option value="en" <?= $currentLanguage == 'en' ? 'selected' : '' ?>>English</option>
        </select>
        <button type="submit"><?= $t['save'] ?></button>
    </form>

    <form action="save-preferences.php" method="POST">
        <input type="hidden" name="delete" value="true">
        <button type="submit"><?= $t['delete'] ?></button>
    </form>

    <a href="index.php"><?= $t['back'] ?></a>
</main>
</body>
</html>