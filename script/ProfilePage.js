function previewImage() {
    const input = document.getElementById('image');
    const image = document.getElementById('profilImage');

    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            image.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
