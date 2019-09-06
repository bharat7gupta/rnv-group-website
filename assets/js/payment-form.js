jQuery(document).ready(function($) {
	"use strict";

	var paymentForm = $('#paymentForm');
	var appToPayFor = $('#application-to-pay-for');
	var keyFieldValue = $('#key-field-value');
	var keyFieldValueCheck = $('#key-field-value-check');

	appToPayFor.on('change', function() {
		if(appToPayFor.val()) {
			paymentForm.submit();
		}
	});

	keyFieldValueCheck.on('click', function() {
		if (keyFieldValue.val().trim() !== "") {
			paymentForm.submit();
		} else {
			alert('Enter ' + keyFieldValueCheck.data('field-name'));
		}
	});
});
