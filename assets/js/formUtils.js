formUtils = {
	constants: {
		emailExp: /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i,
		passwordExp: /^(?=.*[a-zA-Z0-9]).{6,}$/
	},
	// validate a form element
	validate: function (input) {
		var rule = input.attr('data-rule');
	
		if (!rule || rule === null) {
			return false;
		}
	
		var exp;
		var pos = rule.indexOf(':', 0);
	
		if (pos >= 0) {
			exp = rule.substr(pos + 1, rule.length);
			rule = rule.substr(0, pos);
		} else {
			rule = rule.substr(pos + 1, rule.length);
		}
	
		switch (rule) {
			case 'required':
				if (input.val().trim() === '') {
					return true;
				}
				break;
	
			case 'minlen':
				if (input.val().trim().length < parseInt(exp)) {
					return true;
				}
				break;
	
			case 'email':
				if (!formUtils.constants.emailExp.test(input.val())) {
					return true;
				}
				break;

			case 'password':
				if (!formUtils.constants.passwordExp.test(input.val())) {
					return true;
				}
				break;
	
			case 'checked':
				if (! input.is(':checked')) {
					return true;
				}
				break;
	
			case 'regexp':
				exp = new RegExp(exp);
				if (!exp.test(input.val())) {
					return true;
				}
				break;

			case 'match':
				if (input.val() !== $('#'+exp).val()) {
					return true;
				}
				break;
		}
	},

	handleInputValidation: function () {
		var currentInput = $(this),
			dataMsg,
			currentInputError = false;

		if (formUtils.validate(currentInput)) {
			formError = currentInputError = true;
			dataMsg = currentInput.attr('data-msg');
		}

		var errorMessage = (currentInputError ? (dataMsg || 'wrong Input') : '');
		var validationElement = currentInput.next('.validation');

		validationElement.html(errorMessage)

		if (errorMessage) {
			validationElement.show('blind');
		}

		return currentInputError;
	},

	validateCaptcha: function (captchaContainer, captchaId) {
		var reCaptchaResponseId = grecaptcha.getResponse(captchaId);

		if (!reCaptchaResponseId) {
			$(captchaContainer)
				.find('.validation')
				.html('Please select the checkbox')
				.show();

			return true;
		} else {
			$(captchaContainer)
				.find('.validation')
				.html('')
				.hide();

			return false;
		}
	},

	renderCaptcha: function(captchaContainer, captchaRenderBox, captchaIdKey) {
		return function () {
			window[captchaIdKey] = grecaptcha.render(captchaRenderBox, {
				sitekey: '6LcSxbMUAAAAACzcFf3xaS4m9zoMS05zpAHelS-v',
				callback: function() {
					formUtils.validateCaptcha(captchaContainer, window[captchaIdKey]);
				}
			});
		}
	},

	handleApiResponse: function(form, response, nextPageUrl) {
		response = JSON.parse(response);
		var apiError = false;

		if (response.error.fields) {
			$(response.error.fields).each(function(key, value) {
				$('#'+key).parent().find('.validation').html(value);
			});
			apiError = true;
		}

		if (response.error.errorMessage) {
			form.find('.form-error').html(response.error.errorMessage).show();
			apiError = true;
		} else {
			form.find('.form-error').hide();
		}

		if (!apiError) {
			alert(response.data.message);
			window.location = nextPageUrl;
		}
	}
}
