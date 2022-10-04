$(document).ready(function () {
  $("body").tooltip({ selector: "[data-toggle=tooltip]" });
  $("body").popover({ selector: "[data-toggle=popover]" });

  $(".btn-login").prop("disabled", true);

  function validateLoginButton() {
    const buttonDisabled = $(".form-username").val().trim() === "" || $(".form-password").val().trim() === "";
    $(".btn-login").prop("disabled", buttonDisabled);
  }

  $(".form-username").on("keyup", validateLoginButton);
  $(".form-password").on("keyup", validateLoginButton);
});
