<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller {

	function index()
	{
		$this->load->view('api_view');
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			if($data_action == "Delete")
			{
				$api_url = "http://localhost/crud-api/api/delete";

				$form_data = array(
					'id'		=>	$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;




			}

			if($data_action == "Edit")
			{
				$api_url = "http://localhost/crud-api/api/update";

				$form_data = array(
					'id'			=>	$this->input->post('user_id'),
					'name'			=>	$this->input->post('name'),
					'email'			=>	$this->input->post('email'),
					'password'		=>	$this->input->post('password'),
					'gender'		=>	$this->input->post('gender'),
					'is_married'	=>	$this->input->post('is_married'),
					'address'		=>	$this->input->post('address')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);
				
				// view json
				// var_dump($response);die();

				curl_close($client);

				echo $response;

			}

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/crud-api/api/fetch_single";

				$form_data = array(
					'id'		=>	$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;






			}

			if($data_action == "Insert")
			{
				$api_url = "http://localhost/crud-api/api/insert";

				$form_data = array(
					'name'			=>	$this->input->post('name'),
					'email'			=>	$this->input->post('email'),
					// 'password'		=>	password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
					'password'		=>	$this->input->post('password', true),
					'gender'		=>	$this->input->post('gender'),
					'is_married'	=>	$this->input->post('is_married'),
					'address'		=>	$this->input->post('address')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				// view json
				// var_dump($response);die();

				curl_close($client);

				echo $response;


			}





			if($data_action == "fetch_all")
			{
				$api_url = "http://localhost/crud-api/api";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				$result = json_decode($response);

				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						$output .= '
						<tr>
							<td>'.$row->name.'</td>
							<td>'.$row->email.'</td>
							<td>'.$row->gender.'</td>
							<td>'.$row->is_married.'</td>
							<td>'.$row->address.'</td>
							<td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
							<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}

				echo $output;
			}
		}
	}
	
}

?>