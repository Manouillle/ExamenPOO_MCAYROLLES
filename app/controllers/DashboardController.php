<?php
	class DashboardController {
		// Loading the home view.
		function displayHome() {
			require_once('app/views/home/home-view.php');
		}


		public function __construct() {
			$this->equipeManager = new EquipeManager();
		}

		public function displayList() {
			$errors = [];
			$equipes = [];
			
			if(sizeof($errors) === 0) {
				$result = $this->equipeManager->getAllEquipes();
	
				if(is_null($result['equipes'])) {
					array_push($errors, $result['error']);
	
					require_once('app/views/home/home-view.php');
				} else {
	
					$equipes = $result['equipes'];
					require_once('app/views/home/home-view.php');
				}
			} else {
				require_once('app/views/home/home-view.php');
			}
		}

		public function createEquipe($equipe){
			$this->equipeManager->create($equipe);
		}
		
		
		public function delete($id){
			$this->equipeManager->delete($id);
		}


		public function edit($id, $equipe){
			$this->equipeManager->edit($id);
		}
	}
?>