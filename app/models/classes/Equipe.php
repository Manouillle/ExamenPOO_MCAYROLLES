<?php
	class Equipe {
		private $id;
		private $name;
		private $score;
        private $butEncaisse;
        private $butMarque;

		public function __construct($id = null, $name = null, $score = null, $butEncaisse = null, $butMarque = null) {
			$this->id = $id;
			$this->name = $name;
			$this->score = $score;
            $this->butEncaisse = $butEncaisse;
            $this->butMarque = $butMarque;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getName() {
			return $this->name;
		}

		public function setName($name) {
			$this->name = $name;
		}

		public function getScore() {
			return $this->score;
		}

		public function setScore($score) {
			$this->score = $score;
		}

        public function getButEncaisse() {
			return $this->butEncaisse;
		}

		public function setButEncaisse($butEncaisse) {
			$this->butEncaisse = $butEncaisse;
		}

        public function getButMarque() {
			return $this->butMarque;
		}

		public function setButMarque($butMarque) {
			$this->butMarque = $butMarque;
		}
	}
?>