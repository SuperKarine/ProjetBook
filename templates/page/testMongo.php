<?php require_once APP_ROOT . "/templates/page/header.php" ?>

<h1>Test de connexion à MongoDB</h1>

<?php

use MongoDB\Client;

$username = getenv('MONGO_INITDB_ROOT_USERNAME');
$password = getenv('MONGO_INITDB_ROOT_PASSWORD');


var_dump('Username:', $username);
var_dump('Password:', $password);

// URI MongoDB
$uri = "mongodb://$username:$password@mongo:27017";

// Connexion
try {
    $client = new Client($uri);
    $db = $client->ma_base;
    $collection = $db->ma_collection;

    $documents = $collection->find();

    echo "<ul>";
    foreach ($documents as $doc) {
        echo "<li>" . htmlspecialchars(json_encode($doc)) . "</li>";
    }
    echo "</ul>";
} catch (Exception $e) {
    echo "<p>Erreur MongoDB : " . $e->getMessage() . "</p>";
}
?>

<?php require_once APP_ROOT . "/templates/page/footer.php" ?>
