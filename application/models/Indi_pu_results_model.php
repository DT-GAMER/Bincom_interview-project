<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Indi_pu_results_model extends CI_Model {

		public function __construct() {
			parent::__construct();
			// $this->load->database();
		}

		public function fetch_pu_results() {

			$this->db->select('*');
			$this->db->from('announced_pu_results');
			$query = $this->db->get();
			return $dataResult = $query->result();
		}

	}
