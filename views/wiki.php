<?php
require_once('../controllers/WikiController.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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


    <div x-data="setup()" :class="{ 'dark': isDark }">
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

            <!-- Header -->
            <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                <div class="flex items-center justify-end md:justify-center pl-3 w-14 md:w-64 h-14 bg-black dark:bg-gray-800 border-none">
                    <img class="w-5 h-5 md:w-10 md:h-10 mr-2 rounded-full overflow-hidden" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                    <span class="hidden md:block"> Bonjour <?= $_SESSION['name_admin'] ?></span>
                </div>
                <div class="flex justify-end items-center h-14 bg-black dark:bg-gray-800 header-right">
                    <ul class="flex items-center">

                        <li>
                            <a href="../controllers/UtilisateurController.php?q=logout" class="flex items-end justify-end mr-4 hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./Header -->

            <!-- Sidebar -->
            <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-gray-500 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                            </div>
                        </li>
                        <li>
                            <a href="dashboard.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="statistique.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="25px" height="25px" viewBox="0 0 1920 1920">
                                        <g fill-rule="evenodd">
                                            <path d="M0 53h1386.67v342.083c-50.87-14.385-104.54-22.083-160-22.083C902.66 373 640 635.66 640 959.667c0 324.003 262.66 586.663 586.67 586.663 55.46 0 109.13-7.69 160-22.08v342.08H0V53Z" fill-rule="nonzero" />
                                            <path d="M1226.67 1439.67c113.33 0 217.48-39.28 299.6-104.96l302.37 302.65c20.82 20.84 54.59 20.85 75.42.04 20.84-20.82 20.86-54.59.04-75.43l-302.41-302.68c65.7-82.12 104.98-186.29 104.98-299.623 0-265.097-214.91-480-480-480-265.1 0-480.003 214.903-480.003 480 0 265.093 214.903 480.003 480.003 480.003Zm0-106.67c206.18 0 373.33-167.15 373.33-373.333 0-206.187-167.15-373.334-373.33-373.334-206.19 0-373.337 167.147-373.337 373.334 0 206.183 167.147 373.333 373.337 373.333Z" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Statistique</span>
                            </a>
                        </li>
                        <li>
                            <a href="wiki.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24" fill="none">
                                        <path clip-rule="evenodd" d="m12 3.75c-4.55635 0-8.25 3.69365-8.25 8.25 0 4.5563 3.69365 8.25 8.25 8.25 4.5563 0 8.25-3.6937 8.25-8.25 0-4.55635-3.6937-8.25-8.25-8.25zm-9.75 8.25c0-5.38478 4.36522-9.75 9.75-9.75 5.3848 0 9.75 4.36522 9.75 9.75 0 5.3848-4.3652 9.75-9.75 9.75-5.38478 0-9.75-4.3652-9.75-9.75zm9.75-.75c.4142 0 .75.3358.75.75v3.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75v-3.5c0-.4142.3358-.75.75-.75zm0-3.25c-.5523 0-1 .44772-1 1s.4477 1 1 1h.01c.5523 0 1-.44772 1-1s-.4477-1-1-1z" fill="white" fill-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Gestion des wikis</span>
                            </a>
                        </li>
                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
                </div>
            </div>
            <!-- ./Sidebar -->

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                <h1 class="text-center  m-10"><b>Gestion Des Wikis</b></h1>
                <!-- Client Table -->
                <div class="mt-4 mx-4">
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">

                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border p-2">Wiki Title</th>
                                        <th class="border p-2">Content</th>
                                        <th class="border p-2">Archive</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $wiki = new WikiController();
                                    $wiki->GetWiki();

                                    foreach ($wiki->GetWiki() as $wiki) :
                                    ?>
                                        <tr class="border">
                                            <td class="border p-2"><?php echo $wiki['Titre']; ?></td>
                                            <td class="border p-2"><?php echo $wiki['Contenu']; ?></td>
                                            <td class="border p-2 flex justify-around">
                                                <form action="../controllers/WikiController.php" method="POST">
                                                    <input type="hidden" name="WikiId" value="<?php echo $wiki['idWiki']; ?>">
                                                    <input type="hidden" name="wiki" value="archiveWiki">
                                                    <button type="submit" name="archive"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12 21L12 12M12 12L15 15.3333M12 12L9 15.3333" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M20.5 7V13C20.5 16.7712 20.5 18.6569 19.3284 19.8284C18.1569 21 16.2712 21 12.5 21H11.5M3.5 7V13C3.5 16.7712 3.5 18.6569 4.67157 19.8284C5.37634 20.5332 6.3395 20.814 7.81608 20.9259" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                            <path d="M12 3H4C3.05719 3 2.58579 3 2.29289 3.29289C2 3.58579 2 4.05719 2 5C2 5.94281 2 6.41421 2.29289 6.70711C2.58579 7 3.05719 7 4 7H20C20.9428 7 21.4142 7 21.7071 6.70711C22 6.41421 22 5.94281 22 5C22 4.05719 22 3.58579 21.7071 3.29289C21.4142 3 20.9428 3 20 3H16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg></button>
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
</body>

</html>