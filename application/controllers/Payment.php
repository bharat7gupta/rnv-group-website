<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function index() {
		$this->load->view('payment/index');
	}

	public function request() {
		$this->load->view('payment/request');
	}

	public function status() {
		$this->load->view('payment/response');
	}

	public function notify() {
		$this->db->insert('payment_transactions',
			(object) array(
				'orderId' => $this->input->post_get('orderId'),
				'amountPaid' => $this->input->post_get('orderAmount'),
				'appId' => $this->input->post_get('rnvAppId'),
				'appName' => $this->input->post_get('rnvAppName'),
				'transactionID' => $this->input->post_get('referenceId'),
				'currency' => RUPEE_SYMBOL,
				'paymentStatus' => $this->input->post_get('txStatus'),
				'paymentMode' => $this->input->post_get('paymentMode'),
				'transactionMessage' => $this->input->post_get('txMsg'),
				'transactionTimeFromPG' => $this->input->post_get('txTime'),
			)
		);
	}
}

?>