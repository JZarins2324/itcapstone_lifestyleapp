document.querySelector('#change').addEventListener('click', function () {
  submitBtn = document.querySelector('#submit');
  formTitle = document.querySelector('#formTitle');

  if (submitBtn.value == "Login") {
    submitBtn.value = "Create Account";
    formTitle.innerHTML = "Sign Up"
  } else if (submitBtn.value == "Create Account"){
    submitBtn.value = "Login";
    formTitle.innerHTML = "Login";
  }
});