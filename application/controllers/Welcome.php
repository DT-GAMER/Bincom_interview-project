<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('indi_pu_results_model');
		$this->load->model('upload_party_results_model');
	}

	public function index() {
		$this->load->view('home');
	}

	public function qone_function() {
		$indi_pu_results = $this->indi_pu_results_model->fetch_pu_results();
		$this->load->view('question_one', ['indi_pu_results'=>$indi_pu_results]);
	}

	public function qtwo_function() {
		$indi_pu_results = $this->indi_pu_results_model->fetch_pu_results();
		$this->load->view('question_two', ['indi_pu_results'=>$indi_pu_results]);
	}

	public function qthree_function() {
		$states_list = $this->upload_party_results_model->fetch_states();
		$parties_list = $this->upload_party_results_model->fetch_parties();

		$this->load->view('question_three', ['states_list'=>$states_list, 'parties_list'=>$parties_list]);
	}

	public function fetchlgas_function() {
		if($this->input->post('state_id')){
			echo $this->upload_party_results_model->fetch_lgas($this->input->post('state_id'));
		}
	}

	public function fetchwards_function() {
		if($this->input->post('lga_id')){
			echo $this->upload_party_results_model->fetch_wards($this->input->post('lga_id'));
		}
	}

	public function uploadresults_function() {
		$this->form_validation->set_rules('statesnames', 'State', 'required|trim');
		$this->form_validation->set_rules('lganames', 'LGA', 'required|trim');
		$this->form_validation->set_rules('wardsnames', 'Ward', 'required|trim');
		$this->form_validation->set_rules('pollingunitname', 'Polling Unit Name', 'required|trim');
		$this->form_validation->set_rules('pollingunitid', 'Polling Unit ID', 'required|trim');
		$this->form_validation->set_rules('partiesnames', 'Party', 'required|trim');
		$this->form_validation->set_rules('pollingunitscore', 'Party Score', 'required|trim');

		if ($this->form_validation->run() == false) {
			redirect('qthree');

		} else {

			$data = $this->input->post();
			$uploadScoreArray = array(
				'state'=>$data['statesnames'],
				'lga'=>$data['lganames'],
				'ward'=>$data['wardsnames'],
				'polling_unit_name'=>$data['pollingunitname'],
				'polling_unit_uniqueid'=>$data['pollingunitid'],
				'party_name'=>$data['partiesnames'],
				'party_score'=>$data['pollingunitscore']
				
			);

			$this->upload_party_results_model->upload_new_polling_score($uploadScoreArray);
			$this->session->set_flashdata('successsubmit', 'Score Uploaded Successfully');
			redirect('qthree');
		}

	}

}
