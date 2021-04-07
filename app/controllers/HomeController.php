<?php
require_once('app/models/classes/User.php');

class HomeController {
	
	public function __construct() {
		$this->userManager = new UserManager();
		$this->teamManager = new EquipeManager();
	}
	

	public function displayHome() {
		$errors = [];
		$equipes = [];

		if(sizeof($errors) === 0) {
			$result = $this->equipeManager->getAll();

			if(is_null($result['equipes'])) {
				array_push($errors, $result['error']);

				require_once('app/views/home/home-view.php');
			} else {
				$teams = $result['equipes'];
				require_once('app/views/home/home-view.php');
			}
		} else {
			require_once('app/views/user/login-view.php');
		}
	}
}

?>