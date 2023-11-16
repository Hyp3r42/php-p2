const closedFace = document.querySelector(".closed");
const openFace = document.querySelector(".open");

closedFace.onclick = togglefaces;
openFace.onclick = togglefaces;

function togglefaces() {
    openFace.classList.toggle("active");
     closedFace.classList.toggle('active');
    }

function openFacefunction() {
    if (openFace.classList.contains("closed")) {
        closedFace.classList.add("active");
        openFace.classList.remove("active");
    }
}