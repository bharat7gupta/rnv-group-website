<!--==========================
Get Quote Section
============================-->
<div class="quote-btn">
	<input id="get-quote-btn" type="button" value="Get a Quote" class="hvr-buzz">
</div>

<!-- Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Get a Quote</h4>
			</div>
			<div class="modal-body">
				<form id="quoteForm" class="form quoteForm" name="quoteForm" novalidate="novalidate">
					<div class="form-error"></div>
					<div class="form-box">

						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">

							<label>Name</label>
							<input name="name" class="form-control" placeholder="Enter Name" data-rule="required" data-msg="Please enter a name">
							<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Email</label>
							<input name="email" class="form-control" placeholder="Enter Email" data-rule="email" data-msg="Please enter a valid email">
							<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Company</label>
							<input name="company" class="form-control" placeholder="Enter Company" type="text">
							<div class="validation"></div>
							</div>
						</div>

						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Phone</label>
							<input name="phone" class="form-control" placeholder="Enter Phone" type="text" data-rule="regexp:^[56789]\d{9}$" data-msg="Please enter a valid phone number">
							<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Your Website URL</label>
							<input name="website" class="form-control" placeholder="Enter Website" type="text">
							<div class="validation"></div>
							</div>
						</div>

						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Enquiry Type</label>
							<select class="form-control" name="enquiry-type" data-rule="required" data-msg="Please select an Enquiry Type">
								<option value=''>Select Your Project</option>
								<option value='Application enquiry'>Application enquiry</option>
								<option value='Web Based enquiry'>Web Based enquiry</option>
							</select>
							<div class="validation"></div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Enquiry</label>
							<textarea name="enquiry" id="enquiry" class="form-control required" rows="5" placeholder="Enter Enquiry" data-rule="required" data-msg="Please write something for us"></textarea>
							<div class="validation"></div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12 quote-submit">
							<div id="quote-captcha-container">
								<div id="quote-captcha"></div>
								<div class="validation"></div>
							</div>
							<button type="submit" id="button" style="border-color: #03C4EB; background: #03C4EB" class="btn btn-primary btn-lg btn-theme-colored btn-flat" data-loading-text="Please wait...">
								Send your Enquiry
							</button>
						</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
