window.addEventListener("DOMContentLoaded", () => {

	"use strict";

	function formValidation(formSelector, formInputs, formSubmitSelector) {

		const selector = document.querySelector(formSelector),
			  inputs = document.querySelectorAll(formInputs),
			  submitSelector = document.querySelector(formSubmitSelector);

		submitSelector.addEventListener("click", () => {

			inputs.forEach(function(input) {

				if(input.value == "" || !input.checkValidity()) {

					input.classList.add("invalid");
					input.nextElementSibling.style.display = "block";
					input.nextElementSibling.style.visibility = "visible";

				} else {

					input.classList.remove("invalid");
					input.nextElementSibling.style.display = "none";

				}

			});

		});

	}

	function changeActiveForm(defaultActiveFormSelector, defaultDisabledFormSelector, customActiveClass) {

		const activeFormSelector = document.querySelector(defaultActiveFormSelector),
			  disabledFormSelector = document.querySelector(defaultDisabledFormSelector),
			  activeClass = document.querySelector(customActiveClass);

		disabledFormSelector.style.display = "none";

		const signupButtonSelector = document.querySelector(".signup-button"),
			  loginButtonSelector = document.querySelector(".login-button"),
			  signupFormSelector = document.querySelector(".signup-form"),
			  loginFormSelector = document.querySelector(".login-form");

		if(signupButtonSelector.addEventListener("click", () => {

			signupFormSelector.classList.add("active");
			signupFormSelector.removeAttribute("style");

			loginFormSelector.classList.remove("active");
			loginFormSelector.style.display = "none";

		}));

		if(loginButtonSelector.addEventListener("click", () => {

			loginFormSelector.classList.add("active");
			loginFormSelector.removeAttribute("style");

			signupFormSelector.classList.remove("active");
			signupFormSelector.style.display = "none";

		}));

	}

	function changeLanguage(customButton) {

		const customButtonSelector = document.querySelector(customButton),
			  signupFormElements = document.querySelectorAll(".signup-form *[data-ru-text]"),
			  loginFormElements = document.querySelectorAll(".login-form *[data-ru-text]");

		customButtonSelector.addEventListener("click", () => {

			customButtonSelector.style.display = "none";

			signupFormElements.forEach(function(element) {

				element.innerHTML = element.getAttribute('data-ru-text');

			});

			loginFormElements.forEach(function(element) {

				element.innerHTML = element.getAttribute('data-ru-text');

			});

		});

	}

	formValidation(".signup-form", "#signup-image, #signup-email, #signup-name, #signup-password", "#signup-submit");
	formValidation(".login-form", "#login-email, #login-password", "#login-submit");
	changeActiveForm(".signup-form", ".login-form", ".active");
	changeLanguage(".lang-button");

});