<?php
require '../controllers/WikiController.php';
include_once '../includes/detailsheader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 w-full mx-auto my-16"">
        <?php
        $wiki = new WikiController();

        $pathInfoArray = explode("/", $_SERVER['PATH_INFO']);
        $value = $pathInfoArray[1];

        $wikis = $wiki->details($value);

        ?>
        <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $wikis['Titre']; ?></h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $wikis['Contenu']; ?></p>

            <!-- Catégorie -->
            <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Catégorie: <?php echo $wikis['nomCategorie']; ?></p>

            <!-- Tags -->
            <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Tags: <?php echo $wikis['TagNames']; ?></p>

            <!-- Utilisateur et Date -->
            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
                <p>Écrit par <?php echo $wikis['nom']; ?></p>
                <p>Date: <?php echo $wikis['da_te']; ?></p>
            </div>
        </div>
    </div>

</body>

</html>