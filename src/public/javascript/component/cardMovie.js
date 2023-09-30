function addCardItem(item){
    var cards = document.getElementById("cards");
    for (var i = 0; i < item.length; i++) {
        cards.innerHTML += `
        <div class="card">
            <img src="${item[i]}"">
        </div>
        `;
    }
}


//test doang
var arr = [];
for (var i = 0; i < 10; i++) {
    arr.push("images/assets/movie-poster-sample.jpg");
}

addCardItem(arr);
console.log(arr);

document.addEventListener('DOMContentLoaded', function()){
    const films = documnet.querySelectorAll('');
}