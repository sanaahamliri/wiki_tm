<?php
require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/models/Wiki.php';

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $wikiModel = new Wiki;

    $wikis = $wikiModel->found_wiki($input);


    if (count($wikis) == 0){
        echo ' <div class= "text-red-500">Non wiki, categorie ou tag est trouvé par ce nom';
    }
    foreach ($wikis as $wiki) {
        echo '<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">';
        echo '<a href="#">';
        echo '    <img class="rounded-t-lg w-full" src="../images/OIP (1).jpeg" alt="" />';
        echo '</a>';
        
        echo '    <div class="p-5">';
        echo '        <a href="#">';
        echo '            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">' . $wiki['titre'] . '</h5>';
        echo '        </a>';
        echo '        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">';
        echo '            ' . (strlen($wiki['contenu']) > 100 ? substr($wiki['contenu'], 0, 100) . '...' : $wiki['contenu']);
        echo '        </p>';
        echo '        <a href="#">';
        echo '            <h5 class="mb-3 font-normal text-gray-700 dark:text-gray-400""><b>categorie</b> :' . $wiki['nomCategorie'] . '</h5>';
        echo '        </a>';
        echo '        <a href="#">';
        echo '            <h5 class="mb-3 font-normal text-gray-700 dark:text-gray-400""><b>Tags</b> :' . $wiki['TagNames'] . '</h5>';
        echo '        </a>';
        echo '        <a href="./views/details.php/' . $wiki['idWiki'] . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">';
        echo '            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">';
        echo '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />';
        echo '            </svg>';
        echo '            Voir Plus';
        echo '        </a>';
        echo '    </div>';
        echo '</div>';
    }
}
