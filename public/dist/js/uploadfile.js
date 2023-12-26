let profile = document.getElementById("profile");
let inputFile = document.getElementById("input-file");

inputFile.onchange = function () {
    profile.src = URL.createObjectURL(inputFile.files[0]);
}
