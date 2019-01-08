<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Quiz_Difficult_m');
	}

	public function test_function()
	{
		$data['questions'] = "question1";
		$data['answer'] = "answer1";
		$this->load->view('test_view', $data);
	}

	public function view_difficult_questions()
	{
		$data['questions'] = $this->Quiz_Difficult_m->get_all_questions();
		$this->load->view('test_view', $data);
	}
}

