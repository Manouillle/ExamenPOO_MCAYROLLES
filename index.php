<?php
	// Starting the session.
	session_start();

	// Importing model classes.
	require_once('app/models/classes/User.php');
	require_once('app/models/classes/Equipe.php');

	// Importing model managers.
	require_once('app/models/managers/DatabaseManager.php');
	require_once('app/models/managers/UserManager.php');
	require_once('app/models/managers/EquipeManager.php');

	// Importing controllers.
	require_once('app/controllers/DashboardController.php');
	require_once('app/controllers/UserController.php');
	require_once('app/controllers/HomeController.php');

	// Array used to store existing pages.
	$pages = ['user', 'home', 'dashboard'];

	
	


	// If the page is not specified.
	 if (!isset($_GET['page'])) {
		// If there is not a session, redirecting to the login view. Else redirecting to the home view.
		if (empty($_SESSION)) {
			header('Location: index.php?page=user&action=login');
			exit();
		} else {
			header('Location: index.php?page=home&action=home');
			exit();
		}
	} 

	// Checking if the requested page exists, if not throwing an exception.
	if (array_search($_GET['page'], $pages) === false) {
		throw new Exception('Page introuvable', 404);
	} else {
		// If the asked page is user.
		if ($_GET['page'] === 'user') {
			$userController = new UserController();

			// Checking the requested action and processing it.
			if ($_GET['action'] === 'logout') {
				session_destroy();
				header('Location: index.php?page=user&action=login');
				exit();
			} else if ($_GET['action'] === 'login') {
				// If there is a session, redirecting to the home view.
				if (!empty($_SESSION)) {
					header('Location: index.php?page=home&action=home');
					exit();
				}

				// If the login form was posted, processing it. Else, displaying the login from.
				if (!empty($_POST)) {
					$userController->login();
				} else {
					$userController->displayLogin();
				}
			} elseif ($_GET['action'] === 'register') {
				// If there is a session, redirecting to the home view.
				if (!empty($_SESSION)) {
					header('Location: index.php?page=home&action=home');
					exit();
				}

				// If the register form was posted, processing it. Else, displaying the register from.
				if (!empty($_POST)) {
					$userController->register();
				} else {
					$userController->displayRegister();
				}
			} else {
				throw new Exception('Page introuvable', 404);
			}
		}
		
		// If the asked page is dashboard.
		if ($_GET['page'] === 'dashboard') {
			$dashboardController = new DashboardController();

			// If there is not a session, redirecting to the login view.
			if (empty($_SESSION)) {
				header('Location: index.php?page=user&action=login');
				exit();
			}

			 // Checking the requested action and processing it.
			if ($_GET['action'] === 'dashboard') {
				$dashboardController->displayList();
			} else {
				throw new Exception('Page introuvable', 404);
			}
		} 
	}

?>