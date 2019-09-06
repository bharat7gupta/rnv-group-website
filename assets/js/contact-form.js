jQuery(document).ready(function($) {
  	"use strict";

	var formError = false;
	var contactForm = $('form.contactForm');  
	var captchaContainer = $('#message-captcha-container');
	var captchaRenderBox = document.getElementById('message-captcha');
	var captchaIdKey = 'homePageCaptchaId';

	window.onReCaptchaLoadCallback = formUtils.renderCaptcha(captchaContainer, captchaRenderBox, captchaIdKey);

	contactForm.find('.form-group input').on('change', formUtils.handleInputValidation);
	contactForm.find('.form-group input').on('keyup', formUtils.handleInputValidation);
	contactForm.find('.form-group textarea').on('change', formUtils.handleInputValidation);
  	contactForm.find('.form-group textarea').on('keyup', formUtils.handleInputValidation);
  	contactForm.find('.form-group select').on('change', formUtils.handleInputValidation);

  	contactForm.submit(function() {
		formError = false;

		if (formUtils.validateCaptcha(captchaContainer, window[captchaIdKey])) {
			formError = true;
		}

		var formGroup = $(this).find('.form-group');

		formGroup.children('input, textarea, select').each(function(key, input) {
			var currentInputValidity = formUtils.handleInputValidation.call($(input));
			formError = formError || currentInputValidity;
		});

		if (formError) {
			return false;
		}

		$.ajax({
			type: "POST",
			url: window.baseUrl + '/api/posts/message',
			data: $(this).serialize(),
			success: function (response) {
				formUtils.handleApiResponse(contactForm, response, window.baseUrl);
			}
		});

		return false;
  	});

});
