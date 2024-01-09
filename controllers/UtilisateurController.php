<?php

require_once '../models/Utilisateur.php';
require '../helpers/header.php';

class UtilisateurController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new Utilisateur;
    }

    public function register()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'name' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];


        // Validate inputs
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            flash("register", "Please fill out all inputs");
            redirect("../views/signup.php");
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['password'])) {
            flash("register", "Invalid password");
            redirect("../views/signup.php");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid email");
            redirect("../views/signup.php");
        }

        if (strlen($data['password']) < 6) {
            flash("register", "Password should be at least 6 characters");
            redirect("../views/signup.php");
        }

        // // User with the same email or password already exists
        // if($this->userModel->findUserByEmailOrName($data['email'], $data['name'])){
        //     flash("register", "Username or email already taken");
        //     redirect("../views/signup.php");
        // }

        // Passed all validation checks.
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {
            redirect("../../wiki_tm//index.php");
        } else {
            die("Something went wrong");
        }
    }

    public function login()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'name/email' => trim($_POST['name/email']),
            'password' => trim($_POST['password'])
        ];

        if (empty($data['name/email']) || empty($data['password'])) {
            flash("login", "Please fill out all inputs");
            redirect("../views/login.php");
            exit();
        }

        // Check for user/email
        $loggedInUser = $this->userModel->findUserByEmailOrName($data['name/email'], $data['name/email']);

        if ($loggedInUser) {
            // User Found
            if (password_verify($data['password'], $loggedInUser->password)) {
                // Password is correct
                // Create session
                $this->createUserSession($loggedInUser);
            } else {
                flash("login", "Password Incorrect");
                redirect("../views/login.php");
            }
        } else {
            flash("login", "No user found");
            redirect("../views/login.php");
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        $_SESSION['password'] = $user->password;
        redirect("../../wiki_tm/index.php");
    }

    public function logout()
    {
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
        redirect("../../wiki_tm/index.php");
    }
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