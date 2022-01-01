<p class = "md-form">
	<label for = "first_name">First Name</label>
	<input type = "text" id = "first_name" name = "first_name" required = "true" field-name = "First name">
</p>
<p class = "md-form">
	<label for = "last_name">Last Name</label>
	<input type = "text" id = "last_name" name = "last_name" required = "true" field-name = "Last name">
</p>
<div class="md-form">
	<input placeholder = "Birthdate" type = "text" id = "date-picker-example" name = "birthdate" class = "birthdate form-control datepicker" required = "true" field-name = "Birthdate">
	<label for = "date-picker-example">Birthdate</label>
</div>
<p class = "md-form">
	<label for = "report_subject">Report subject</label>
	<input type = "text" id = "report_subject" name = "report_subject" required = "true" field-name = "Report subject">
</p>
<p class = "md-form">
	<?= view("partials/select_country") ?>
</p>
<p>
	<input type = "tel" id = "phone" name = "phone" required = "true" field-name = "Phone number">
</p>
<p class = "md-form">
	<label for = "email">E-mail</label>
	<input type = "text" id = "email" name = "email" required = "true" field-name = "E-mail">
</p>