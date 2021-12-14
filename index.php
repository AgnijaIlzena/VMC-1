<?php
require_once 'config.php';
require __DIR__.'/src/models/recipe-model.php';

// Fetching all recipes
$recipes = getAllRecipes();

// Generate the web page
require __DIR__ . '/src/views/index.php';

// Generate the web page with Form
//require __DIR__ . '/src/views/form.php';






