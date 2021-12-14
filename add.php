<?php
require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = trim($_POST['title']) . trim($_POST['description']);

    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /ok');
    }
}

require __DIR__ . '/src/views/form.php';