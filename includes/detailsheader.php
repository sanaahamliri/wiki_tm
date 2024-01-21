<?php
if (!isset($_SESSION['user'])) {
  echo '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Login System</title>
        <link rel="stylesheet" href="./assets/css/style.css?v=' . time() . '">
    </head>
    
    <body>
        <nav>
            <ul>
                <a href="../../index.php">
                    <li>Home</li>
                </a>
                <a href="../signup.php">
                    <li>Sign Up</li>
                </a>
                <a href="../login.php">
                    <li>Login</li>
                </a>
    
            </ul>
    
        </nav>';
} else {
  echo '
  <div class="flex items-center">
    <button type="button" class="flex items-center justify-center text-sm bg-gray-800 rounded-full md:me-0 ml-8 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 w-10 h-10" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 1024 1024" class="icon" version="1.1">
        <path d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z" fill="#4A5699"/>
        <path d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z" fill="#C45FA0"/>
        <path d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z" fill="#E5594F"/>
  
        </svg>
    </button>
    <span class="ml-2 text-sm">Open user menu</span>
</div>


    
    <!-- Dropdown Menu -->
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <!-- User Info Section -->
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Bonjour ' . $_SESSION['name_author'] . '</span>
            <span class="block text-sm text-gray-500 truncate dark:text-gray-400">' . $_SESSION['email_author'] . '</span>
        </div>
    
        <!-- User Actions Section -->
        <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
                <a href="../AddWiki.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Add Wiki</a>
            </li>
            <li>
                <a href="../../controllers/UtilisateurController.php?q=logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
            </li>
        </ul>
    </div>';
}
