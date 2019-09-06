jQuery(document).ready(function($) {
	"use strict";

	var formError = false;
	var registrationForm = $('form.register-form');
	var captchaContainer = $('#register-captcha-container');
	var captchaRenderBox = document.getElementById('register-captcha');
	var captchaIdKey = 'registrationCaptchaId';

	window.onReCaptchaLoadCallback = formUtils.renderCaptcha(captchaContainer, captchaRenderBox, captchaIdKey);

	registrationForm.find('.form-group input').on('change', formUtils.handleInputValidation);
	registrationForm.find('.form-group input').on('keyup', formUtils.handleInputValidation);

	registrationForm.submit(function() {
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
			url: window.baseUrl + '/api/accounts/register',
			data: $(this).serialize(),
			success: function (response) {
				formUtils.handleApiResponse(registrationForm, response, window.baseUrl + '/admin');
			}
		});

		return false;
	});

});
