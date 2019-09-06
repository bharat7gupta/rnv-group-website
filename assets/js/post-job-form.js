jQuery(document).ready(function($) {
	"use strict";

	var formError = false;
	var jobForm = $('form.jobForm');
	var editJobID;

	jobForm.find('.form-group input').on('change', formUtils.handleInputValidation);
	jobForm.find('.form-group input').on('keyup', formUtils.handleInputValidation);
	jobForm.find('.form-group textarea').on('change', formUtils.handleInputValidation);
	jobForm.find('.form-group textarea').on('keyup', formUtils.handleInputValidation);

	jobForm.submit(function() {
		formError = false;
		var formData;

		var formGroup = $(this).find('.form-group');
		formGroup.children('input, textarea').each(function(key, input) {
			var currentInputValidity = formUtils.handleInputValidation.call($(input));
			formError = formError || currentInputValidity;
		});

		if (formError) {
			return false;
		}

		if (editJobID) {
			var data = $(this).serialize();
			formData = 'jobID=' + editJobID + '&' + data;
		} else {
			formData = $(this).serialize();
		}

		$.ajax({
			type: "POST",
			url: window.baseUrl + '/api/posts/job',
			data: formData,
			success: function (response) {
				formUtils.handleApiResponse(jobForm, response, window.baseUrl + '/jobs');
			}
		});

		return false;
	});

	// Job Create Button
	$('#new-job-button').on('click', function() {
		$('#jobModal .modal-title').html('Post a New Job');
		jobForm.find('#job-submit').html('Post Job');

		$('#jobModal').modal('show');
	});

	// Job Edit
	$(".job .actions .edit").on('click', function() {
		editJobID = $(this).data('job-id');

		// read all existing values
		var jobTitle = $(this).closest('.job').find('.job-title .job-field-value').html();
		var skillset = $(this).closest('.job').find('.skillset .job-field-value').html();
		var experience = $(this).closest('.job').find('.experience .job-field-value').html();
		var jobDescription = $(this).closest('.job').find('.job-description').html();

		// populate values
		jobForm.find('#job-title').val(jobTitle);
		jobForm.find('#skillset').val(skillset);
		jobForm.find('#experience').val(experience);
		jobForm.find('#job-description').val(jobDescription);

		$('#jobModal .modal-title').html('Edit Job');
		jobForm.find('#job-submit').html('Edit Job');

		$('#jobModal').modal('show');
	});

	// Job Delete
	$(".job .actions .delete").on('click', function() {

		if (confirm ('Are you sure you want to delete?')) {
			$.ajax({
				type: "GET",
				url: window.baseUrl + '/api/posts/deletejob/' + $(this).data('job-id'),
				success: function (response) {
					response = JSON.parse(response);

					if (response && response.error && response.error.errorMessage) {
						alert(response.error.errorMessage);
					} else if (response && response.data && response.data.message) {
						alert(response.data.message);
						window.location = window.baseUrl + '/jobs';
					}
				}
			});
		}

	});

});
