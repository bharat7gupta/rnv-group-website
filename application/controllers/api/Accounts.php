<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('application/utils/CommonUtils.php');
include('application/utils/HttpClient.php');
include('application/controllers/api/ApiResponse.php');

class Accounts extends CI_Controller {

	public function login() {
		$email = $this->input->post_get('email', '');
		$password = $this->input->post_get('password', '');
		$gReCaptchaResponse = $this->input->post_get('g-recaptcha-response', '');

		$captchaValidationResponse = CommonUtils::validateCaptcha($gReCaptchaResponse);

		$apiResponse = new ApiResponse();

		if ($captchaValidationResponse == false) {

			$apiResponse->error->errorMessage = 'Please try again...';

		} else {
			$responseObj = json_decode($captchaValidationResponse);

			if ($responseObj->success == false) {
				$apiResponse->error->errorMessage = 'Suspicious Request Suspected';
			} else if ($responseObj->success == true) {
				// Captcha is verified. Verify all fields now
				$query = $this->db->query('select `active` from admin_users where emailID="'.$email.'" and password="'.$password.'";');
				$row = $query->row();

				if (isset($row)) {
					if ($row->active == 'D') {
						$apiResponse->error->errorMessage = 'Please contact admin to activate your account.';
					} else {
						$apiResponse->data = (object) array('message' => 'Logged in successfully!');
						$this->session->set_userdata('IS_ADMIN', 'TRUE');
					}
				} else {
					$apiResponse->error->errorMessage = 'Invalid Email Id or Password';
				}
			}
		}

		echo json_encode($apiResponse);
	}

	public function register() {
		$email = $this->input->post_get('email', '');
		$password = $this->input->post_get('password', '');
		$confirmPassword = $this->input->post_get('confirm-password', '');
		$gReCaptchaResponse = $this->input->post_get('g-recaptcha-response', '');

		$captchaValidationResponse = CommonUtils::validateCaptcha($gReCaptchaResponse);

		$apiResponse = new ApiResponse();

		if ($captchaValidationResponse == false) {

			$apiResponse->error->errorMessage = 'Please try again...';

		} else {
			$responseObj = json_decode($captchaValidationResponse);

			if ($responseObj->success == false) {
				$apiResponse->error->errorMessage = 'Suspicious Request Suspected';
			} else if ($responseObj->success == true) {
				// Captcha is verified. Verify all fields now
				$formErrors = array();

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$formErrors['email'] = 'Please enter a valid email';
				} else if ($password == '') {
					$formErrors['password'] = 'Please enter a password';
				} else if ($confirmPassword == '' || $password != $confirmPassword) {
					$formErrors['confirm-password'] = 'Passwords do not match';
				}

				if (count($formErrors) > 0) {
					$apiResponse->error->fields = $formErrors;
				} else {

					// insert new user data here.
					try {
						$this->db->insert('admin_users', (object) array('emailID' => $email, 'password' => $password));
						$apiResponse->data = (object) array('message' => 'Successfully Registered! Please contact admin to activate your account.');
					} catch (Exception $ex) {
						$apiResponse->error->errorMessage = 'Could not register. Please try again.';
					}
				}
			}
		}

		echo json_encode($apiResponse);
	}
}

?>