<?php

class CommonUtils {
	public static function validateCaptcha($gReCaptchaResponse) {
		if (!isset($gReCaptchaResponse)) {
			return false;
		}

		$httpClient = new HttpClient(array(
			'url' => 'https://www.google.com/recaptcha/api/siteverify',
			'data' => array(
				'secret' => '6LcSxbMUAAAAALIN3jctGKPPN9vF3L6aC0Ls0sHE',
				'response' => $gReCaptchaResponse
			)
		));

		try {
			$httpClient->post();

			if ($httpClient->getError()) {
				return false;
			} else {
				return $httpClient->getResults();
			}
		} catch (Exception $ex) {
			return false;
		}
	}
}

?>