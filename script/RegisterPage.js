document.getElementById("registrasi").addEventListener("submit", function(event){
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("konfirmasi").value;

  if (password !== confirmPassword) {
    event.preventDefault();
    alert("Password dan konfirmasi password tidak cocok!");
  }
})

function validasi() {
  var form = document.getElementById("registForm");
  var elements = form.elements;
  var emptyFields = [];

  for (var i = 0; i < elements.length; i++) {
    if (elements[i].hasAttribute("required") && elements[i].value.trim() === "") {
      emptyFields.push(elements[i].getAttribute("id"));
    }
  }

  if (emptyFields.length > 0) {
    alert("Mohon lengkapi semua kolom yang wajib diisi!");
    document.getElementById(emptyFields[0]).focus();
    return false;
  }

  return true;
}

function showPassword() {
  var passwordInput = document.getElementById("inputPassword");
  var showPwdCheckbox = document.getElementById("showPwd");

  passwordInput.type = showPwdCheckbox.checked ? "text" : "password";
}
function showConfirm() {
  var konfirmasiInput = document.getElementById("konfirmasiPass");
  var showConfCheckbox = document.getElementById("showConf");

  konfirmasiInput.type = showConfCheckbox.checked ? "text" : "password";
}