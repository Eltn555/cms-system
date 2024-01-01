let profile = document.getElementById("profile");
let inputFile = document.getElementById("input-file");

inputFile.onchange = function () {
    profile.src = URL.createObjectURL(inputFile.files[0]);
}

let profile2 = document.getElementById("profile2");
let inputFile2 = document.getElementById("input-file2");

inputFile2.onchange = function () {
    profile2.src = URL.createObjectURL(inputFile2.files[0]);
}
