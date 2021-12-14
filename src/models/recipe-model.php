<?php

function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}



function getAllRecipes(): array
{
    $connection = createConnection();

    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipe = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $recipe;
}

function getRecipeById(int $id): array
{
    $connection = createConnection();

    $query = 'SELECT title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $recipe = $statement->fetch(PDO::FETCH_ASSOC);

    return $recipe;
}

function saveRecipe()
{
    $connection = createConnection();

    // lance une requête SQL pour engistrer la recette
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO recipe (title, description) VALUES (:title, :description)";
    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $title, \PDO::PARAM_STR);
    $statement->bindValue(':description', $description, PDO::PARAM_STR);
    $statement->execute();

    $recipe = $statement->fetchAll(PDO::FETCH_BOTH);
    return $recipe;


    //$connection->exec($query);
    //return $recipe;

}


