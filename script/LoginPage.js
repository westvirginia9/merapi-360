function showPassword() {
    var passwordInput = document.getElementById("inputPassword");
    var showPwdCheckbox = document.getElementById("showPwd");

    passwordInput.type = showPwdCheckbox.checked ? "text" : "password";
}

function validasi() {
    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var warningAll = document.getElementById("warningAll");
    var warningUser = document.getElementById("warningUser");
    var warningPass = document.getElementById("warningPass");
    
    // Sembunyikan semua pesan peringatan terlebih dahulu
    warningAll.style.display = "none";
    warningUser.style.display = "none";
    warningPass.style.display = "none";

    if (username === "" && password === "") {
        warningAll.style.display = "block";
        return false; // Mencegah formulir untuk disubmit
    } else if (username === "") {
        warningUser.style.display = "block";
        return false; // Mencegah formulir untuk disubmit
    } else if (password === "") {
        warningPass.style.display = "block";
        return false; // Mencegah formulir untuk disubmit
    }

    // Lanjutkan dengan aksi formulir jika semua field diisi
    return true;
}
