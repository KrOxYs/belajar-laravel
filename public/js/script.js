alert("Selamat Datang");

function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    // preview image style
    imgPreview.style.display = "block";

    // read data image
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    // load
    oFReader.onload = function (oFREvent) {
        // ambil data dari src
        imgPreview.src = oFREvent.target.result;
    };
}
