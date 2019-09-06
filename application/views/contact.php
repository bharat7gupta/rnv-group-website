<!--==========================
    Contact Section
============================-->
<section id="contact" class="section-bg wow fadeInUp">
	<div class="container">
		<div class="section-header">
			<h3>Contact Us</h3>
			<div class="section-title-divider"></div>
			<p>Need to get in touch with the team? We are reachable by all means 😀</p>
		</div>

		<div class="row contact-info">

			<div class="col-md-3">
				<a class="contact-item contact-address" href='<?= CONTACT_ADDRESS_LINK ?>' target="_blank">
					<i class="ion-ios-location-outline"></i>
					<h3><?= CONTACT_ADDRESS_TITLE ?></h3>
					<address><?= CONTACT_ADDRESS_FIRST_LINE ?></address>
					<address><?= CONTACT_ADDRESS_SECOND_LINE ?></address>
					<address><?= CONTACT_ADDRESS_THIRD_LINE ?></address>
				</a>
			</div>

			<div class="col-md-3">
				<a class="contact-item contact-phone" href="tel:<?= CONTACT_PHONE_NUMBER ?>">
					<i class="ion-ios-telephone-outline"></i>
					<h3><?= CONTACT_PHONE_DISPLAY_TEXT ?></h3>
					<p><?= CONTACT_PHONE_DISPLAY_NUMBER ?></p>
				</a>
			</div>

			<div class="col-md-3">
				<a class="contact-item contact-email" href="mailto:<?= CONTACT_EMAIL_VALUE ?>">
					<i class="ion-ios-email-outline"></i>
					<h3><?= CONTACT_EMAIL_DISPLAY_TEXT ?></h3>
					<p><?= CONTACT_EMAIL_VALUE ?></p>
				</a>
			</div>

			<div class="col-md-3">
				<a class="contact-item contact-whatsapp" href="<?= getWhatsAppLink() ?>" target="_blank">
					<i class="ion-social-whatsapp-outline"></i>
					<h3><?= CONTACT_WHATSAPP_DISPLAY_TEXT ?></h3>
					<p><?= CONTACT_WHATSAPP_DISPLAY_NUMBER ?></p>
				</a>
			</div>

		</div>

		<div class="form" style="margin-top: 60px">
			<div id="sendmessage">Your message has been sent. Thank you!</div>
			<div id="errormessage"></div>
			<form action="" method="post" role="form" class="contactForm">
				<div class="form-error"></div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
						<div class="validation"></div>
					</div>
					<div class="form-group col-md-6">
						<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
						<div class="validation"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<select name="subject" id="subject" class="subject-dropdown" data-rule="required" data-msg="Please select a Subject">
							<option value="">Select Subject</option>
							<option value="Application enquiry">Application enquiry</option>
							<option value="Web Based enquiry">Web Based enquiry</option>
							<option value="Job Openings">Job Openings</option>
							<option value="Grievance Redressal">Grievance Redressal</option>
							<option value="Others">Others</option>
						</select>
						<div class="validation"></div>
					</div>

					<div class="form-group col-md-6">
						<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" data-rule="regexp:^[56789]\d{9}$" data-msg="Please enter a valid mobile number" />
						<div class="validation"></div>
					</div>
				</div>

				<div class="form-group">
					<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
					<div class="validation"></div>
				</div>

				<div class="message-submit">
					<div id="message-captcha-container">
						<div id="message-captcha"></div>
						<div class="validation"></div>
					</div>
					<button type="submit">Send Message</button>
				</div>
			</form>
		</div>
	</div>
</section>
