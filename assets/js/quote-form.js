jQuery(document).ready(function($) {
	"use strict";

	var formError = false;
	var quoteForm = $('form.quoteForm');
	var captchaContainer = $('#quote-captcha-container');
	var captchaRenderBox = document.getElementById('quote-captcha');
	var captchaIdKey = 'homePageCaptchaId';

	$('#get-quote-btn').on('click', function() {
		$('#quoteModal').modal('show');

		formUtils.renderCaptcha(captchaContainer, captchaRenderBox, captchaIdKey)();
	})

	quoteForm.find('.form-group input').on('change', formUtils.handleInputValidation);
	quoteForm.find('.form-group input').on('keyup', formUtils.handleInputValidation);
	quoteForm.find('.form-group textarea').on('change', formUtils.handleInputValidation);
	quoteForm.find('.form-group textarea').on('keyup', formUtils.handleInputValidation);
	quoteForm.find('.form-group select').on('change', formUtils.handleInputValidation);

	quoteForm.submit(function() {
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
			url: window.baseUrl + '/api/posts/quote',
			data: $(this).serialize(),
			success: function (response) {
				formUtils.handleApiResponse(quoteForm, response, window.baseUrl);
			}
		});

		return false;
	});

});
