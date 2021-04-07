<?php
	class UserController {
		private $userManager;

		public function __construct() {
			$this->userManager = new UserManager();
		}

		// Loading the login view.
		public function displayLogin() {
			require_once('app/views/user/login-view.php');
		}

		// Loading the register view.
		public function displayRegister() {
			require_once('app/views/user/register-view.php');
		}

		public function login() {
			$errors = [];

			// If the username is not set, adding the error to the list.
			if(empty($_POST['username'])) {
				$error = 'Veuillez saisir un nom d\'utilisateur !';
				array_push($errors, $error);
			}

			// If the password is not set, adding the error to the list.
			if(empty($_POST['password'])) {
				$error = 'Veuillez saisir un mot de passe !';
				array_push($errors, $error);
			}

			// If the error list is empty, try to log the user in.
			if(sizeof($errors) === 0) {
				$login = $this->userManager->login($_POST['username'], $_POST['password']);

				// If there is no result, adding the error to the list. Else, adding the username to the session and redirecting the user to the home view.
				if(is_null($login['user'])) {
					array_push($errors, $login['error']);

					require_once('app/views/user/login-view.php');
				} else {
					$_SESSION['username'] = $login['user']->getUsername();

					header('Location: index.php?page=dashboard&action=home');
					exit();
				}
			} else {
				require_once('app/views/user/login-view.php');
			}
		}

		public function register() {
			$errors = [];

			// If the passwords are different, adding the error to the list.
			if($_POST['password'] !== $_POST['password-confirm']){
				$error = 'Les mots de passes sont différents !';
				array_push($errors, $error);
			}

			// If the username is not set, adding the error to the list.
			if(empty($_POST['username'])){
				$error = 'Veuillez saisir un nom d\'utilisateur !';
				array_push($errors, $error);
			}

			// If the password is not set, adding the error to the list.
			if(empty($_POST['password'])){
				$error = 'Veuillez saisir un mot de passe !';
				array_push($errors, $error);
			}

			// If there are errors in the list, displaying the register form. Else, trying to register the user.
			if(sizeof($errors) != 0) {
				require_once('app/views/user/register-view.php');
			} else {
				$user = new User(null, $_POST['username'], $_POST['password']);
				$register = $this->userManager->register($user);

				// If there is an error, adding the error to the list and loading the register form. Else, redirecting the user to the login view.
				if(!is_null($register['error'])) {
					$error = $register['error'];
					array_push($errors, $error);

					require_once('app/views/user/register-view.php');
				} else {
					header('Location: index.php?page=user&action=login');
					exit();
				}
			}

		}
	}
?>