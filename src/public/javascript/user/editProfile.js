var modal = document.getElementById("confModal");
var btn = document.getElementById("deleteButton");
var span = document.getElementsByClassName("close")[0];
var closeButton = document.getElementById("cancel");
var okButton = document.getElementById("ok");

function popModal() {
    modal.style.display = "block";
}
function closeModal() {
    modal.style.display = "none";
}
const closePage = (id) => {
    location.replace('/settings' + id);
}
