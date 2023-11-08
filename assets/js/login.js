change = document.querySelector('#change');

change.addEventListener('click', function () {
  submitBtn = document.querySelector('#submit');
  formTitle = document.querySelector('#formTitle');

  if (submitBtn.value == "Login") {
    submitBtn.value = "Create Account";
    submitBtn.name = "Create Account";
    formTitle.innerHTML = "Sign Up";
    change.innerHTML = "Login"

  } else if (submitBtn.value == "Create Account"){
    submitBtn.value = "Login";
    submitBtn.name = "Login";
    formTitle.innerHTML = "Create Account";
    change.innerHTML = "Create Account"
  }
});