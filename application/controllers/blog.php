<?php
class Blog extends CI_Controller {

	function index() {
//		$data = array(
//			'title' => 'My Title',
//			'heading' => 'My Heading',
//			'message' => 'My Message'
//		);

		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";

		$this->load->view('blogview', $data);
		$this->load->view('test/test');
		$this->load->view('test/test2');
	}

	function comments()
	{
		echo 'Look at this!';
	}
}
?>