<?php
include_once './includes/indexheader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../wiki_tm/assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class=" bg-white dark:bg-slate-600">
    <header class='p-2 bg-slate-100 relative bg-white dark:bg-slate-600'>


        <div class="flex ">
            <div class=" w-full ">



                <div class=' my-5  h-3/4 text-center   '>
                    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">Bienvenue dans la Page Home
                    </h1>
                    <p class="px-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit earum voluptates quae, amet deleniti totam culpa qui adipisci repellat quo necessitatibus molestias enim quis, labore rem porro, et doloremque ad.</p>
                    <!-- ======================Search form================================== -->
                    <div class="search m-10">
                        <div class="text-center mt-5 mb-4">
                            <h2>CHERCHER UNE WIKI OU UNE CATEGORIE</h2>
                        </div>
                        <input type="text" class="form-control" id="live_search" placeholder="search ...">
                    </div>

                    <!-- ======================Search form================================== -->
                    <div id="resultat"></div>
                    <h2>Dernières Wikis</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5">

                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                            <a href="#">
                                <img class="rounded-t-lg w-full w-24" src="./images/glowing_realistic_3d_square_button_with_wikipedia_icon.jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, dicta?</p>
                                <a href="./blogarticle.php?idArticle=<?php echo 'azertyhjdjygagd' ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                            <a href="#">
                                <img class="rounded-t-lg w-full w-24" src="./images/glowing_realistic_3d_square_button_with_wikipedia_icon.jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, dicta?</p>
                                <a href="./blogarticle.php?idArticle=<?php echo 'azertyhjdjygagd' ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                            <a href="#">
                                <img class="rounded-t-lg w-full w-24" src="./images/glowing_realistic_3d_square_button_with_wikipedia_icon.jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, dicta?</p>
                                <a href="./blogarticle.php?idArticle=<?php echo 'azertyhjdjygagd' ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>



        </div>

        <h1 class="text-center">Dernières Categories</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5">

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                <div class="p-3">
                    <a href="#">
                        <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h3>
                    </a>
                </div>
            </div>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                <div class="p-3">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h5>
                    </a>
                </div>
            </div>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h5>
                    </a>
                </div>
            </div>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">sanaaHml</h5>
                    </a>
                </div>
            </div>



        </div>

    </header>
    <main>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                //alert(input);
                if (input != "") {
                    $.ajax({
                        url: "../controllers/WikiController.php",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $("#resultat").html(data);
                            $("#resultat").css("display", "block");
                        }
                    });
                } else {

                    $("#resultat").html("");
                    $("#resultat").css("display", "none");
                }
            });
        });
    </script>
</body>

</html>