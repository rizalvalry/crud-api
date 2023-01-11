<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data = $this->api_model->fetch_all();
		echo json_encode($data->result_array());
	}

	function insert()
	{
		$this->form_validation->set_rules('name', 'Your Name', 'required');
		$this->form_validation->set_rules('email', 'Your Mail', 'required');
		$this->form_validation->set_rules('password', 'Your Pass', 'required|trim');
		$this->form_validation->set_rules('gender', 'Your Gender', 'required');
		$this->form_validation->set_rules('is_married', 'Your Status', 'required');
		$this->form_validation->set_rules('address', 'Your Address', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'			=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('name'))))),
				'email'			=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('email'))))),
				'password'		=>	password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'gender'		=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('gender'))))),
				'is_married'	=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('is_married'))))),
				'address'		=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('address')))))
			);

			$this->api_model->insert_api($data);

			$array = [
				"status" => [
					  "code" => 200, 
					  "response" => "success",
					  "message" => "Data Success Inserted"
				],
				"result" => [
					"data" => $data
				]
			 ]; 
			
		}
		else
		{
			$array = [
				"status" => [
					  "code" 		=> 401, 
					  "response" 	=> "failed",
					  "message" 	=> "Data Failed Inserted",
				],
				"name_error" 		=>	form_error('name'),
				"email_error"		=>	form_error('email'),
				"password_error"	=>	form_error('password'),
				"gender_error"		=>	form_error('gender'),
				"is_married_error"	=>	form_error('is_married'),
				"address_error"		=>	form_error('address')

			 ]; 
		}
		echo json_encode($array);
	}
	
	function fetch_single()
	{
		if($this->input->post('id'))
		{
			$data = $this->api_model->fetch_single_user($this->input->post('id'));

			foreach($data as $row)
			{
				$output['name'] = $row['name'];
				$output['email'] = $row['email'];
				// $output['password'] = "fill password";
				$output['gender'] = $row['gender'];
				$output['is_married'] = $row['is_married'];
				$output['address'] = $row['address'];
			}
			echo json_encode($output);
		}
	}

	function update()
	{
		$this->form_validation->set_rules('name', 'Your Name', 'required');
		$this->form_validation->set_rules('email', 'Your Mail', 'required');
		$this->form_validation->set_rules('password', 'Your Pass', 'required|trim');
		$this->form_validation->set_rules('gender', 'Your Gender', 'required');
		$this->form_validation->set_rules('is_married', 'Your Status', 'required');
		$this->form_validation->set_rules('address', 'Your Address', 'required');
		if($this->form_validation->run())
		{	
			$data = array(
				'name'			=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('name'))))),
				'email'			=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('email'))))),
				'password'		=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('password'))))),
				'gender'		=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('gender'))))),
				'is_married'	=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('is_married'))))),
				'address'		=>	stripslashes(strip_tags(htmlentities(htmlspecialchars($this->input->post('address')))))
			);

			$this->api_model->update_api($this->input->post('id'), $data);


			$array =  [
				"status" => [
					  "code" => 200, 
					  "response" => "success",
					  "message" => "Success Update Data",
				],
				"result" => [
					"data" => $data
				]
			 ]; 
			
		}
		else
		{

			$array = [
				"status" => [
					  "code" => 401, 
					  "response" => "failed",
					  "message" => "Failed Update Data"
				],
				"name_error" 		=>	form_error('name'),
				"email_error"		=>	form_error('email'),
				"password_error"	=>	form_error('password'),
				"gender_error"		=>	form_error('gender'),
				"is_married_error"	=>	form_error('is_married'),
				"address_error"		=>	form_error('address')

			 ]; 
		}
		echo json_encode($array);
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			if($this->api_model->delete_single_user($this->input->post('id')))
			{
				$array = [
					"status" => [
						  "code" => 200, 
						  "response" => "success",
						  "message" => "Data Success Deleted"
						  
					],
					"name_error" =>	form_error('name'),
					"email_error"	=>	form_error('email')
	
				 ];  
				// array(

				// 	'success'	=>	true
				// );
			}
			else
			{
				$array = [
					"status" => [
						  "code" => 401, 
						  "response" => "failed",
						  "message" => "Failed Update Data"
					],
					"error" =>	true
	
				 ]; 
				
				// array(
				// 	'error'		=>	true
				// );
			}
			echo json_encode($array);
		}
	}

}


?>