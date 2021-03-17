var currentTab = Number(localStorage.getItem("currentTab"));
var finished_steps = Number(localStorage.getItem("finished_steps"));
var avatar = "";
$.mask.definitions['9'] = false;
$.mask.definitions['n'] = "[0-9]";

function showTab(n) {
	var x = document.getElementsByClassName("tab");
	for (var i = x.length - 1; i >= 0; i--) {
		if (i == n) {
			$(x[i]).css("display", "block");
		} else {
			$(x[i]).css("display", "none");
		}
	}
	if (n == 0) {
		document.getElementById("previous").style.display = "none";
	} else {
		document.getElementById("previous").style.display = "inline";
	}
	if (n == (x.length - 1)) {
		document.getElementById("next").innerHTML = "Submit";
	} else {
		document.getElementById("next").innerHTML = "Next";
	}
	fixStepIndicator(n);
}

function ifUserJustReturned() {
	if (localStorage.getItem("user_just_returned")) {
		return true;
	} else {
		return false;
	}
}

function ifSubmitted() {
	if (localStorage.getItem("submitted") == "true") {
		return true;
	} else {
		return false;
	}
}

function setSubmitted() {
	localStorage.setItem("submitted", true);
}

function nextPrev(n) {
	var x = document.getElementsByClassName("tab");
	if (n == 1 && !validateForm()) {
		return false;
	}
	$("#previous").click(function() {
		localStorage.setItem("user_just_returned", true);
	});
	x[currentTab].style.display = "none";
	currentTab += n;
	finished_steps += n;
	localStorage.setItem("currentTab", currentTab);
	localStorage.setItem("finished_steps", finished_steps);
	if (currentTab == 1 && !ifUserJustReturned()) {
		insert();
	} else if (currentTab == 1 && ifUserJustReturned()) {
		if (serializeFirstTabData() != localStorage.getItem("first_tab_data")) {
			update();
			console.log("Member data is updated.");
		} else {
			console.log("Member data doesn't need to be updated. It's still the same.");
		}
		setTimeout(function() {
			localStorage.setItem("first_tab_data", serializeFirstTabData());
		}, 300);
	}
	if (currentTab >= x.length) {
		update();
		setSubmitted();
		showSocialButtons();
		return false;
	}
	showTab(currentTab);
}

function fixStepIndicator(n) {
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	x[n].className += " active";
}

function validateName(value) {
	var regExp = /^[^\d_!@#$%^&*\(\)"'№;:?\[\]\{\}\/\\<>,\.`~+=]+$/;
	if (regExp.test(value)) {
		return true;
	}
}

function validateBirthdate(value) {
	var chosenDate = new Date(value);
	if (chosenDate.getTime() <= Date.now()) {
		return true;
	} else {
		return false;
	}
}

function setCountryUsingGeo() {
	$.get("https://api.ipdata.co?api-key=5bdb37174c8f78a83e68e7fe4932de00d3add080cf575ae1dd1afcbf", function(response) {
		var country_code = (response && response.country_code) ? response.country_code : "US";
		$('#country').find("option").filter(function(index) {
			if ($(this).attr("country_code") == response.country_code) {
				$(".select-dropdown.form-control").val($(this).attr("country_name"));
				$(this).attr("selected", true);
			}
		});
	}, "jsonp");
}

function maskPhone(mask) {
	$("#phone").mask(mask, {
		autoclear: false
	});
}

function maskPhoneField() {
	var placeholder = $("#phone").attr("placeholder");
	var mask = placeholder.replace(/[0-9]/g, "n");
	maskPhone(mask);
}

function validatePhone(value) {
	if ($("#phone").intlTelInput("isValidNumber")) {
		return true;
	} else {
		return false;
	}
}

function validateEmail(value) {
	var regExp = /^([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (regExp.test(value)) {
		return true;
	}
}

function isEmailUnique(value) {
	if (localStorage.getItem("is_email_unique") == 1) {
		return true;
	} else {
		return false;
	}
}

function stripTags(string) {
	return string.replace(/<[^>]+\s?\/?>/g, "");
}

function validateFileType(value) {
	var regExp = /^image\/\w+$/;
	if (regExp.test(value)) {
		return true;
	}
}

function validateForm() {
	var x, y, i, valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].querySelectorAll("#first_name, #last_name, .birthdate, #report_subject, #phone, #email, #company, #position, #about");
	for (i = 0; i < y.length; i++) {
		let validation_condition_1 = (
			(y[i].value == "") &&
			(y[i].getAttribute("required") == "true")
		);
		let validation_condition_2 = (!validateName(y[i].value) &&
			(
				(y[i].getAttribute("name") == "first_name") ||
				(y[i].getAttribute("name") == "last_name")
			)
		);
		let validation_condition_3 = (!validateBirthdate(y[i].value) &&
			(y[i].getAttribute("name") == "birthdate")
		);
		let validation_condition_4 = (!validatePhone(y[i].value) &&
			(y[i].getAttribute("name") == "phone")
		);
		let validation_condition_5 = (!validateEmail(y[i].value) &&
			(y[i].getAttribute("name") == "email")
		);
		let validation_condition_6 = (!isEmailUnique(y[i].value) &&
			(y[i].getAttribute("name") == "email")
		);

		if (
			(y[i].getAttribute("name") == "report_subject") ||
			(y[i].getAttribute("name") == "company") ||
			(y[i].getAttribute("name") == "position") ||
			(y[i].getAttribute("name") == "about")
		) {
			y[i].value = stripTags(y[i].value);
		}

		if (y[i].getAttribute("name") != "photo") {
			y[i].value = y[i].value.trim();
		}

		var message = "";
		if (
			validation_condition_1 ||
			validation_condition_2 ||
			validation_condition_3 ||
			validation_condition_4 ||
			validation_condition_5 ||
			validation_condition_6
		) {
			if (validation_condition_1) {
				message = $(y[i]).attr("field-name") + " field is required.";
			} else if (
				validation_condition_2 ||
				validation_condition_3 ||
				validation_condition_4 ||
				validation_condition_5
			) {
				message = $(y[i]).attr("field-name") + " is not valid.";
			} else if (validation_condition_6) {
				message = "An account with " + y[i].value + " email already exists."
			} else {
				message = "An error occured.";
			}
			mdb_alert(message);
			valid = false;
		}
	}
	if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	}

	return valid;
}

function resetForm() {
	localStorage.clear();
	document.querySelectorAll('textarea, input').forEach(function(e) {
		if ($(e).attr("data-activates") != "select-options-country") {
			$(e).val("");
		}
		if ($(e).attr("name") != "birthdate") {
			$(e).siblings("label").each(function() {
				$(this).removeAttr("class");
			});
		}
	});
	setCountryUsingGeo();
	$.get("https://api.ipdata.co?api-key=5bdb37174c8f78a83e68e7fe4932de00d3add080cf575ae1dd1afcbf", function(response) {
		var country_code = (response && response.country_code) ? response.country_code : "US";
		$("#phone").intlTelInput("setCountry", country_code);
	}, "jsonp");
	localStorage.setItem("currentTab", 0);
	localStorage.setItem("finished_steps", 0);
	currentTab = 0;
	finished_steps = 0;
	showTab(currentTab);
}

function serializeFirstTabData() {
	var data = {};
	$($(".tab")[0]).find(
		"#first_name, #last_name, .birthdate, #report_subject, #email"
	).each(function() {
		data[$(this).attr("name")] = $(this).val();
	});
	data["country"] = $("#country option:selected").attr("country_name");
	data["phone"] = $("#phone").intlTelInput("getNumber", intlTelInputUtils.numberFormat.E164);
	data = JSON.stringify(data);
	return data;
}

function serializeFormData() {
	var data = {};
	$(".tab").each(function() {
		$(this).find(
			"#first_name, #last_name, .birthdate, #report_subject, #email, #company, #position, #about"
		).each(function() {
			data[$(this).attr("name")] = $(this).val();
		});
	});
	data["country"] = $("#country option:selected").attr("country_name");
	data["phone"] = $("#phone").intlTelInput("getNumber", intlTelInputUtils.numberFormat.E164);
	data["photo"] = avatar;
	data = JSON.stringify(data);
	return data;
}

function getJustInsertedUserEmail() {
	if (localStorage.getItem("just_inserted_user_email")) {
		return localStorage.getItem("just_inserted_user_email");
	} else {
		return false;
	}
}

function insert() {
	$.ajax({
		type: "POST",
		url: "add_member",
		data: {
			formData: serializeFormData()
		},
		success: function(data) {
			data = JSON.parse(data);
			localStorage.setItem("just_inserted_user_id", data[0].id);
			localStorage.setItem("just_inserted_user_email", data[0].email);
			localStorage.setItem("first_tab_data", serializeFirstTabData());
		}
	});
}

function update() {
	$.ajax({
		type: "POST",
		url: "modify_member",
		data: {
			id: localStorage.getItem("just_inserted_user_id"),
			formData: serializeFormData()
		},
		success: function(data) {
			data = JSON.parse(data);
			localStorage.setItem("just_inserted_user_id", data[0].id);
			localStorage.setItem("just_inserted_user_email", data[0].email);
		}
	});
}

function mdb_alert(message) {
	toastr.warning(message);
}

function showSocialButtons() {
	$.ajax({
		type: "POST",
		url: "count_all_members",
		success: function(data) {
			$("#all_members_button").text("All members (" + data + ")");
		}
	});
	$("#conference").css("display", "flex");
	$("#conference h1, .form-step-navigation, .form-steps").css("display", "none");
	$(".social-buttons").css("display", "block");
}

function hideSocialButtons() {
	$("#conference h1, .form-step-navigation, .form-steps").css("display", "block");
	$(".social-buttons").css("display", "none");
}

function returnToTheForm() {
	localStorage.clear();
	$("#conference").css("display", "block");
	hideSocialButtons();
	currentTab = 0;
	finished_steps = 0;
	showTab(currentTab);
	resetForm();
}

document.addEventListener("DOMContentLoaded", function() {
	document.querySelectorAll(
		"#first_name, #last_name, #report_subject, #email, #company, #position, #about"
	).forEach(function(e) {
		if ($(e).val() === "") {
			$(e).val(localStorage.getItem($(e).attr("name")));
			if ($(e).val() != "") {
				$(e).siblings().each(function() {
					$(this).attr("class", "active")
				});
			} else {
				e.removeAttribute("class");
			}
		}
		$(e).on("input", function() {
			localStorage.setItem($(e).attr("name"), e.value);
		});
	});

	$(".birthdate").change(function() {
		localStorage.setItem("birthdate", $(this).val());
	});
	if ($(".birthdate").val() === "") {
		$(".birthdate").val(localStorage.getItem("birthdate"));
	}

	if (!localStorage.getItem("country")) {
		setCountryUsingGeo();
	} else {
		$('#country').find("option").filter(function(index) {
			if ($(this).attr("country_name") == localStorage.getItem("country")) {
				$($('#country').find("option")[index]).attr("selected", true);
			}
		});
	}

	$("#phone").intlTelInput({
		initialCountry: "auto",
		nationalMode: true,
		separateDialCode: true,
		utilsScript: '../../public/js/utils.js'
	});
	$("#phone").on("focus", function() {
		maskPhoneField();
		localStorage.setItem("phone_field_placeholder", $("#phone").attr("placeholder"));
		$(this).attr("placeholder", "");
	});
	$("#phone").on("blur", function() {
		$(this).attr("placeholder", localStorage.getItem("phone_field_placeholder"));
	});
	$("#phone").on("keydown", function() {
		maskPhoneField();
		localStorage.setItem("phone", $("#phone").val());
	});
	if ($("#phone").val() === "") {
		$("#phone").val(localStorage.getItem("phone"));
	}

	$("#next").click(function() {
		$.ajax({
			type: "POST",
			url: "is_email_unique",
			data: {
				just_inserted_user_email: getJustInsertedUserEmail(),
				entered_email: $("#email").val()
			},
			success: function(data) {
				localStorage.setItem("is_email_unique", data);
			}
		});
	});

	$("#photo").change(function(file) {
		file = $(this).get(0).files[0];
		const reader = new FileReader();
		reader.addEventListener("load", (event) => {
			if (validateFileType(file.type)) {
				avatar = event.target.result;
				$(".file-path-wrapper input").val(file.name);
			} else {
				mdb_alert("File type is unsuitable, so it isn't uploaded. Please, try again.");
				$(".file-path-wrapper input").val("");
			}
		});
		reader.readAsDataURL(file);
	});

	if (!currentTab) {
		localStorage.setItem("currentTab", 0);
	}

	if (!finished_steps) {
		localStorage.setItem("finished_steps", 0);
	}

	var steps = $(".tab").length;
	var html = "";
	for (var i = 0; i < steps; i++) {
		html += "<span class = 'step'></span>";
		$(".form-steps").html(html);
	}

	for (var i = 0; i < finished_steps; i++) {
		document.getElementsByClassName("step")[i].className += " finish";
	}

	showTab(currentTab);
});

$(document).ready(function() {
	$('.datepicker').pickadate({
		format: 'yyyy-mm-dd',
		max: Date.now()
	});
	$('.mdb-select').materialSelect();
	$("#country").change(function() {
		$('#country').find("option").filter(function(index) {
			if ($(this).attr("country_name") == $(".select-dropdown.form-control").val()) {
				$($('#country').find("option")[index]).attr("selected", true);
			}
		});
		localStorage.setItem("country", $("#country option:selected").attr("country_name"));
	});
	$("#phone").on("countrychange", function() {
		$("#phone").on("focus", function() {
			if ($("#phone").intlTelInput("getSelectedCountryData").iso2) {
				localStorage.setItem("phone_field_country_code", $("#phone").intlTelInput("getSelectedCountryData").iso2);
			}
		});
	});
	if (!localStorage.getItem("phone_field_country_code")) {
		$.get("https://api.ipdata.co?api-key=5bdb37174c8f78a83e68e7fe4932de00d3add080cf575ae1dd1afcbf", function(response) {
			var country_code = (response && response.country_code) ? response.country_code : "us";
			$("#phone").intlTelInput("setCountry", country_code);
		}, "jsonp");
	} else {
		$("#phone").intlTelInput("setCountry", localStorage.getItem("phone_field_country_code"));
	}
	$("#email").inputmask("email");
});

if (ifSubmitted()) {
	showSocialButtons();
} else {
	hideSocialButtons();
}