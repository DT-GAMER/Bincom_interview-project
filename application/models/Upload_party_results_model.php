<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Upload_party_results_model extends CI_Model {

		public function __construct() {
			parent::__construct();
			// $this->load->database();
		}

		public function fetch_states() {

			$this->db->select('*');
			$this->db->from('states');
			$query = $this->db->get();
			return $dataResult = $query->result();
		}

		public function fetch_parties() {
			
			$this->db->select('*');
			$this->db->from('party');
			$query = $this->db->get();
			return $dataResult = $query->result();
		}

		public function fetch_lgas($state_id) {

			$this->db->where('state_id', $state_id);
			$query = $this->db->get('lga');
			$dataResult = "<option value''>---</option>";
			foreach ($query->result() as $row) {
				$dataResult .= "<option value='".$row->lga_id."'>".$row->lga_name."</option>";
			}

			return $dataResult;
		}

		public function fetch_wards($lga_id) {

			$this->db->where('lga_id', $lga_id);
			$query = $this->db->get('ward');
			$dataResult = "<option value''>---</option>";
			foreach ($query->result() as $row) {
				$dataResult .= "<option value='".$row->ward_id."'>".$row->ward_name."</option>";
			}

			return $dataResult;
		}

		public function upload_new_polling_score($uploadScoreArray) {
			
			$this->db->insert('announced_new_pu_results', $uploadScoreArray);
		}

	}
