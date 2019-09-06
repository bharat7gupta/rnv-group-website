<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('application/utils/CommonUtils.php');
include('application/utils/HttpClient.php');
include('application/controllers/api/ApiResponse.php');

class Posts extends CI_Controller {
	public function message() {
		$apiResponse = new ApiResponse();

		$name = $this->input->post_get('name', '');
		$email = $this->input->post_get('email', '');
		$mobile = $this->input->post_get('mobile', '');
		$subject = $this->input->post_get('subject', '');
		$message = $this->input->post_get('message', '');

		$gReCaptchaResponse = $this->input->post_get('g-recaptcha-response', '');

		$captchaValidationResponse = CommonUtils::validateCaptcha($gReCaptchaResponse);

		if ($captchaValidationResponse == false) {

			$apiResponse->error->errorMessage = 'Please try again...';

		} else {
			$responseObj = json_decode($captchaValidationResponse);

			if ($responseObj->success == false) {
				$apiResponse->error->errorMessage = 'Suspicious Request Suspected';
			} else if ($responseObj->success == true) {
				// Captcha is verified. Verify all fields now
				$formErrors = array();

				if ($name == '') {
					$formErrors['name'] = 'Please enter a valid name';
				} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$formErrors['email'] = 'Please enter a valid email';
				} else if ($mobile == '') {
					$formErrors['mobile'] = 'Please enter a valid mobile';
				} else if ($subject == '') {
					$formErrors['subject'] = 'Please enter a valid subject';
				} else if ($message == '') {
					$formErrors['message'] = 'Please enter a valid message';
				}

				if (count($formErrors) > 0) {
					$apiResponse->error->fields = $formErrors;
				} else {

					// insert new user data here.
					try {
						$this->db->insert('user_messages', (object) array(
							'name' => $name,
							'emailID' => $email,
							'mobileNumber' => $mobile,
							'subject' => $subject,
							'message' => $message
						));
						$apiResponse->data = (object) array('message' => 'Message Sent Successfully');
					} catch (Exception $ex) {
						$apiResponse->error->errorMessage = 'Could not post the message. Please try again.';
					}
				}
			}
		}

		echo json_encode($apiResponse);
	}

	public function quote() {
		$apiResponse = new ApiResponse();

		$name = $this->input->post_get('name', '');
		$email = $this->input->post_get('email', '');
		$phone = $this->input->post_get('phone', '');
		$company = $this->input->post_get('company', '');
		$website = $this->input->post_get('website', '');
		$enquiryType = $this->input->post_get('enquiry-type', '');
		$enquiry = $this->input->post_get('enquiry', '');

		$gReCaptchaResponse = $this->input->post_get('g-recaptcha-response', '');

		$captchaValidationResponse = CommonUtils::validateCaptcha($gReCaptchaResponse);

		if ($captchaValidationResponse == false) {

			$apiResponse->error->errorMessage = 'Please try again...';

		} else {
			$responseObj = json_decode($captchaValidationResponse);

			if ($responseObj->success == false) {
				$apiResponse->error->errorMessage = 'Suspicious Request Suspected';
			} else if ($responseObj->success == true) {
				// Captcha is verified. Verify all fields now
				$formErrors = array();

				if ($name == '') {
					$formErrors['name'] = 'Please enter a valid name';
				} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$formErrors['email'] = 'Please enter a valid email';
				} else if ($phone == '') {
					$formErrors['phone'] = 'Please enter a phone number';
				} else if ($enquiryType == '') {
					$formErrors['enquiry-type'] = 'Please enter a valid enquiry type';
				} else if ($enquiry == '') {
					$formErrors['enquire'] = 'Please enter some enquiry text';
				}

				if (count($formErrors) > 0) {
					$apiResponse->error->fields = $formErrors;
				} else {

					// insert new user data here.
					try {
						$this->db->insert('user_quotes', (object) array(
							'name' => $name,
							'emailID' => $email,
							'phone' => $phone,
							'company' => $company,
							'enquiryType' => $enquiryType,
							'enquiry' => $enquiry
						));
						$apiResponse->data = (object) array('message' => 'Quote Query Submitted Successfully. We will get back to you!');
					} catch (Exception $ex) {
						$apiResponse->error->errorMessage = 'Could not save the requested quote. Please try again.';
					}
				}
			}
		}

		echo json_encode($apiResponse);
	}

	public function job() {
		$apiResponse = new ApiResponse();

		if (!isset($this->session->IS_ADMIN)) {
			$apiResponse->error->errorMessage = 'Unauthorized...';
			echo json_encode($apiResponse);
		}

		$jobID = $this->input->post_get('jobID', '');
		$jobTitle = $this->input->post_get('job-title', '');
		$skillset = $this->input->post_get('skillset', '');
		$experience = $this->input->post_get('experience', '');
		$jobDescription = $this->input->post_get('job-description', '');

		$formErrors = array();

		if ($jobTitle == '') {
			$formErrors['job-title'] = 'Please enter job title';
		} else if ($skillset == '') {
			$formErrors['skillset'] = 'Please enter skillset';
		} else if ($experience == '') {
			$formErrors['experience'] = 'Please enter experience';
		} else if ($jobDescription == '') {
			$formErrors['job-description'] = 'Please enter job description';
		}

		if (count($formErrors) > 0) {
			$apiResponse->error->fields = $formErrors;
		} else {

			if ($jobID == '') {
				// insert new data here.
				try {
					$this->db->insert('jobs', (object) array(
						'jobTitle' => $jobTitle,
						'skillset' => $skillset,
						'experience' => $experience,
						'jobDescription' => $jobDescription
					));
					$apiResponse->data = (object) array('message' => 'Job Posted Successfully!');
				} catch (Exception $ex) {
					$apiResponse->error->errorMessage = 'Could not save the job. Please try again.';
				}
			} else {
				// update data here.
				try {
					$this->db->where('jobID', $jobID);
					$this->db->update('jobs', (object) array(
						'jobTitle' => $jobTitle,
						'skillset' => $skillset,
						'experience' => $experience,
						'jobDescription' => $jobDescription
					));

					if ($this->db->affected_rows() == 1) {
						$apiResponse->data = (object) array('message' => 'Job Updated Successfully!');
					} else {
						$apiResponse->data = (object) array('message' => 'Job could not be updated. Job does not exist.');
					}
				} catch (Exception $ex) {
					$apiResponse->error->errorMessage = 'Could not save the job. Please try again.';
				}
			}

		}

		echo json_encode($apiResponse);
	}

	public function deletejob($jobID) {
		$apiResponse = new ApiResponse();

		if (!isset($this->session->IS_ADMIN)) {
			$apiResponse->error->errorMessage = 'Unauthorized...';
			echo json_encode($apiResponse);
		}

		try {
			$this->db->where('jobID', $jobID);
			$this->db->delete('jobs');

			if ($this->db->affected_rows() == 1) {
				$apiResponse->data = (object) array('message' => 'Job Deleted Successfully!');
			} else {
				$apiResponse->error->errorMessage = 'Job could not be deleted. Job does not exist.';
			}
		} catch (Exception $ex) {
			$apiResponse->error->errorMessage = 'Please try again.';
		}

		echo json_encode($apiResponse);
	}
}

?>
