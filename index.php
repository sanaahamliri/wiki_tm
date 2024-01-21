<?php
require_once 'controllers/WikiController.php';
require_once 'controllers/CategorieController.php';
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body class=" bg-white dark:bg-slate-600">

    <header class='p-2 relative bg-white dark:bg-slate-600'>
        <?php require_once 'includes/indexheader.php'; ?>

        <div class="flex ">
            <div class=" w-full ">

                <div class=' my-5  h-3/4 text-center   '>
                    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">Bienvenue sur notre Wiki
                    </h1>
                    <p class="px-20">Explorez, créez et partagez des connaissances de manière intuitive</p>
                    <!-- ======================Search form================================== -->
                    <div class="search m-10">
                        <input type="searchInput" class="form-control" id="search-navbar" name="search" placeholder="search ...">
                    </div>

                    <!-- ======================Search form================================== -->
                    <div id="search_result" class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5"></div>

                    <!-- <h3><b>Dernières Wikis</b></h3> -->

                    <div id="wikis" class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5">
                        <?php
                        $wikiController = new WikiController();
                        $wikis = $wikiController->GetWiki();

                        foreach ($wikis as $wiki) :
                        ?>
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                                <a href="#">
                                    <img class="rounded-t-lg w-full" src="./images/OIP (1).jpeg" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $wiki['Titre']; ?></h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        <?php
                                        echo strlen($wiki['Contenu']) > 100 ? substr($wiki['Contenu'], 0, 100) . '...' : $wiki['Contenu'];
                                        ?>
                                    </p>

                                    
                                    <a href="#">
                                        <h5 class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>categorie</b>:<?php echo $wiki['nomCategorie']; ?></h5>
                                    </a>
                                    <a href="#">
                                        <h5 class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>Tags</b> :<?php echo $wiki['TagNames']; ?></h5>
                                    </a>
                                    <a href="./views/details.php/<?php echo $wiki['idWiki']; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                        Voir Plus
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>



        </div>

        <h3 class="text-center"><b>les categories recentes</b></h3>

        <div id="categories"  class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5">
            <?php
            $wiki = new CategorieController();
            $categories = $wiki->GetCategorie();

            foreach ($categories as $categorie) :
            ?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                    <div class="p-3">
                        <a href="#" class="text-center block">
                            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $categorie['nomCategorie']; ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </header>
    <main>

    </main>

    <script>
$("#search-navbar").keyup(function() {
        var input = $(this).val();
        if (input != "") {

            const fetchUrl = "<?php echo './controllers/search.php'; ?>";
            $.ajax({
                url: fetchUrl,
                method: "POST",
                data: {
                    input: input
                },

                success: function(tasks) {

                    $("#search_result").html(tasks);


                },
                error: function(xhr, status, error) {
                    console.error('Error fetching tasks:', status, error);
                }
            });
            $("#wikis").hide();
            $("#search_result").show()

        } else {
            $("#wikis").show();
            $("#search_result").hide()

        }

    })

    </script>
</body>

</html>