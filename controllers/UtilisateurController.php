<?php
session_start();
require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/models/Utilisateur.php';
require_once 'C:/xampp/htdocs/a_wiki/wiki_tm/helpers/header.php';
class UtilisateurController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new Utilisateur;
    }
    /*====================Register====================== */
    public function register()
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data = [
            'name' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);


        if ($this->userModel->register($data)) {
            redirect("../views/login.php");
        } else {
            die("Something went wrong");
        }
    }
    /*====================End Register====================== */



    /*==================== Login ====================== */
    public function login()
    {

        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        if (empty($data['email']) || empty($data['password'])) {
            echo '<script>';
            echo 'alert("Please fill out all inputs");';
            echo 'window.location.href="../views/login.php";';
            echo '</script>';
            exit();
        } else {
            $loggedInUser = $this->userModel->findUserByEmailOrName($data['email']);
        }

        if ($loggedInUser) {

            if (!password_verify($data['password'], $loggedInUser['password'])) {
                echo '<script>';
                echo 'alert("Invalid password");';
                echo 'window.location.href="../views/login.php";';
                echo '</script>';
                exit();
            } else {
                if ($loggedInUser['role'] == 1) {
                    $_SESSION['admin'] = $loggedInUser['idUser'];
                    $_SESSION['name_admin'] = $loggedInUser['nom'];
                    $_SESSION['email_admin'] = $loggedInUser['email'];
                    redirect("../views/dashboard.php");
                } else {
                    $_SESSION['user'] = $loggedInUser['idUser'];
                    $_SESSION['name_author'] = $loggedInUser['nom'];
                    $_SESSION['email_author'] = $loggedInUser['email'];
                    redirect("../index.php");
                }
            }
        } else {
            echo '<script>';
            echo 'alert("No user found");';
            echo 'window.location.href="../views/login.php";';
            echo '</script>';        }
    }

    /*====================End Login====================== */



    /*====================Session====================== */

    // public function createUserSession($user)
    // {
    //     $_SESSION['idUser'] = $user['idUser'];
    //     $_SESSION['name'] = $user['nom'];
    //     $_SESSION['email'] = $user['email'];
    //     redirect("../../wiki_tm/index.php");
    // }
    /*====================End Session====================== */


    /*====================Logout function====================== */

    public function logout()
    {
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
        redirect("../../wiki_tm/index.php");
    }
    /*====================End Logout function====================== */
}


$init = new UtilisateurController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect("../../wiki_tm/index.php");
    }
} else {
    switch ($_GET['q']) {
        case 'logout':
            $init->logout();
            break;
        default:
            redirect("../../wiki_tm/index.php");
    }
}
