<?php

	class Questionnaire extends CI_Controller {
		public function next() {

		}

		public function previous() {

		}

		public function question() {
			$this->load->view('templates/header');
			$this->load->view('questionnaire/knowyourskin');
			$this->load->view('templates/footer');
		}
	}