jQuery(document).ready(function($) {
	"use strict";

	var formError = false;
	var loginForm = $('form.login-form');
	var captchaContainer = $('#login-captcha-container');
	var captchaRenderBox = document.getElementById('login-captcha');
	var captchaIdKey = 'loginCaptchaId';

	window.onReCaptchaLoadCallback = formUtils.renderCaptcha(captchaContainer, captchaRenderBox, captchaIdKey);

	loginForm.find('.form-group input').on('change', formUtils.handleInputValidation);
	loginForm.find('.form-group input').on('keyup', formUtils.handleInputValidation);

	loginForm.submit(function() {
		formError = false;

		if (formUtils.validateCaptcha(captchaContainer, window[captchaIdKey])) {
			formError = true;
		}

		var formGroup = $(this).find('.form-group');
		formGroup.children('input').each(function(key, input) {
			var currentInputValidity = formUtils.handleInputValidation.call($(input));
			formError = formError || currentInputValidity;
		});

		if (formError) {
			return false;
		}

		$.ajax({
			type: "POST",
			url: window.baseUrl + '/api/accounts/login',
			data: $(this).serialize(),
			success: function (response) {
				formUtils.handleApiResponse(loginForm, response, window.baseUrl);
			}
		});

		return false;
	});

});
