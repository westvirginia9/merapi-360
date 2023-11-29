document.getElementById("registrasi").addEventListener("submit", function(event){
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("konfirmasi").value;
  
    if (password !== confirmPassword) {
      event.preventDefault();
      alert("Password dan konfirmasi password tidak cocok!");
    }
})