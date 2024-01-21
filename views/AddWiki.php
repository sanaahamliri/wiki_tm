<?php

require_once '../controllers/CategorieController.php';
require_once '../controllers/TagController.php';
require_once '../controllers/WikiController.php';
if (isset($_SESSION['user'])) {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    </head>
    <style>
        /* Custom style */
        .header-right {
            width: calc(100% - 3.5rem);
        }

        .sidebar:hover {
            width: 16rem;
        }

        @media only screen and (min-width: 768px) {
            .header-right {
                width: calc(100% - 16rem);
            }
        }
    </style>

    <body>

        <header class="">
            <nav class="bg-white border-gray-200">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo
                            '<button type="button" class="flex items-center justify-center text-sm bg-gray-800 rounded-full md:me-0 ml-8 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 w-10 h-10" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 1024 1024" class="icon" version="1.1">
                            <path d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z" fill="#4A5699"/>
                            <path d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z" fill="#C45FA0"/>
                            <path d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z" fill="#E5594F"/>
                      
                            </svg>
                        </button>
                        <span class="ml-2 text-sm">Open user menu</span>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white">BONJOUR ' . $_SESSION['name_author'] . '</span>
              <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">' . $_SESSION['email_author'] . '</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="../index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Home</a>
              </li>
              <li>
                <a href="../controllers/UtilisateurController.php?q=logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
              </li>
            </ul>
          </div>';
                        }
                        //              else {
                        //                 echo
                        //                 '<a href="..\wiki_tm\index.php">
                        //     <li>Home</li>
                        // </a>
                        // <a href="views\signup.php">
                        //     <li>Sign Up</li>
                        // </a>
                        // <a href="views\login.php">
                        //     <li>Login</li>
                        // </a>';
                        //             }
                        ?>
                        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-cta" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <section class=" w-screen flex justify-center">
            <!-- Main modal -->
            <div id="crud" aria-hidden="false" class="overflow-y-auto overflow-x-hidden justify-center items-center w-10/12 md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Creer une nouvelle Wiki
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="../controllers/WikiController.php" method="post">
                            <input type="hidden" name="wiki" value="AddW">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                                    <input type="text" name="titre_wiki" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Taper votre titre de wiki">
                                </div>
                                <div class="col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu de la Wiki</label>
                                    <textarea id="description" name="contenu_wiki" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ecrire le contenu de la wiki"></textarea>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>

                                    <!-- tags dropdown trigger -->
                                    <button id="dropdownTagsButton" data-dropdown-toggle="dropdownTags" class=" inline-flex items-center justify-between bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="button">
                                        Selectionner tags
                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>

                                    <!-- tags dropdown menu -->
                                    <div id="dropdownTags" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                        <ul class=" h-32 px-3 py-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTagsButton">
                                            <?php
                                            $tagV = new TagController();

                                            foreach ($tagV->GetTag() as $tag) :
                                            ?>
                                                <li>
                                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        <input id="checkbox-item-<?php echo $tag["idTag"]; ?>" type="checkbox" name="tags[]" value="<?php echo $tag["idTag"]; ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="checkbox-item-<?php echo $tag["idTag"]; ?>" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?php echo $tag["nomTag"]; ?></label>
                                                    </div>
                                                </li>

                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="categoryID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>

                                        <?php
                                        $category = new CategorieController();

                                        foreach ($category->GetCategorie() as $categorie) :
                                        ?>
                                            <option value="<?php echo $categorie["idCategorie"]; ?>"><?php echo $categorie["nomCategorie"]; ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="text-white inline-flex items-center bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add new wiki
                            </button>
                        </form>
                    </div>
                </div>
            </div>



        </section>


        <div id="crud" aria-hidden="false" class="overflow-y-auto overflow-x-hidden justify-center items-center w-10/12 md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64 ">
                <h3 class="text-center font-semibold text-gray-900 dark:text-white">
                    Votre Wikis
                </h3>
                <!-- Client Table -->
                <div class="mt-4 mx-4">
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">

                                <thead>
                                    <tr class="bg-gray-200">

                                        <th class="border p-2">Wiki Title</th>
                                        <th class="border p-2">Content</th>
                                        <th class="border p-2">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $wiki = new WikiController();
                                    $wiki->GetWiki();
                                    // print_r($wiki->GetWiki());
                                    foreach ($wiki->GetWiki() as $wiki) :
                                    ?>
                                        <tr class="border">

                                            <td class="border p-2"><?php echo $wiki['Titre']; ?></td>
                                            <td class="border p-2"><?php echo $wiki['Contenu']; ?></td>
                                            <td class="border p-2 flex justify-around">
                                                <!-- Modal toggle -->
                                                <button data-modal-target="authentication-modal-edit-<?php echo $wiki["idWiki"]; ?>" data-modal-toggle="authentication-modal-edit-<?php echo $wiki["idWiki"]; ?>" class="block text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                    Modifier
                                                </button>

                                                <!-- Main modal -->
                                                <div id="authentication-modal-edit-<?php echo $wiki["idWiki"]; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                    modifier une wiki
                                                                </h3>
                                                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-4 md:p-5">
                                                                <form class="space-y-4" action="../controllers/WikiController.php" method="post">
                                                                    <input type="hidden" name="wiki" value="EditW">
                                                                    <input type="hidden" name="idWiki" value="<?php echo $wiki["idWiki"]; ?>">

                                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                                        <div class="col-span-2">
                                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                            <input type="text" name="Newtitre_wiki"" id=" name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="antrez le nouveau nom de la wiki ici" required="">
                                                                        </div>


                                                                        <div class="col-span-2">
                                                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu de la Wiki</label>
                                                                            <textarea id="description" name="Newcontenu_wiki" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-600 focus:border-gray-700 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-600 dark:focus:border-gray-700" placeholder="Ecrire le nouveau contenu de la wiki"></textarea>
                                                                        </div>

                                                                        <div class="col-span-2">
                                                                            <ul class=" h-32 px-3 py-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTagsButton">
                                                                                <?php
                                                                                $tagV = new TagController();

                                                                                foreach ($tagV->GetTag() as $tag) :
                                                                                ?>
                                                                                    <li>
                                                                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                                            <input id="checkbox-item-<?php echo $tag["idTag"]; ?>" type="checkbox" name="Newtags[]" value="<?php echo $tag["idTag"]; ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                                            <label for="checkbox-item-<?php echo $tag["idTag"]; ?>" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?php echo $tag["nomTag"]; ?></label>
                                                                                        </div>
                                                                                    </li>

                                                                                <?php endforeach; ?>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-span-2">
                                                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                                            <select id="category" name="NewcategoryID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                <option selected="">Select category</option>

                                                                                <?php
                                                                                $category = new CategorieController();

                                                                                foreach ($category->GetCategorie() as $categorie) :
                                                                                ?>
                                                                                    <option value="<?php echo $categorie["idCategorie"]; ?>"><?php echo $categorie["nomCategorie"]; ?></option>

                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" name="EditW" class="text-white inline-flex items-center bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        Ajouter
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border p-2 flex justify-around">
                                                <form action="../controllers/WikiController.php" method="post">
                                                    <input type="hidden" name="wiki" value="DeleteW">
                                                    <input type="hidden" name="idWiki" value="<?php echo $wiki["idWiki"]; ?>">
                                                    <button type="submit" class="archive-btn" name="#">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } else {
    header('Location:../index.php');
} ?>