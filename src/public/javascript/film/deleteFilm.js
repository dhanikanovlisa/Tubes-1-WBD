var modal = document.getElementById("confModal");
var btn = document.getElementById("deleteButton");
var span = document.getElementsByClassName("close")[0];

function popModal() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}