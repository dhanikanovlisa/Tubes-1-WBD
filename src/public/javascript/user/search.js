const form = document.forms['search-film'];

const search = form.elements['title'];
const orderby = form.elements['orderby'];
const genre = form.elements['genre'];

const resultContainer = document.getElementById('result-container');
const paginationContainer = document.getElementById('pagination-container');

const fetchResults = (search_title=null, search_orderby=null, search_genre=null)=>{
    const xhr_film = new XMLHttpRequest();
    const xhr_pagination = new XMLHttpRequest();
    const params = new URLSearchParams(window.location.search);

    if(search_title){
        params.set('title', search_title);
    }
    if(search_orderby){
        params.set('orderby', search_orderby);
    }
    if(search_genre){
        params.set('genre',search_genre);
    }
    const location = '/search/search?'+params.toString();
    xhr_film.open('GET', location, true);
    xhr_film.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr_film.send();

    xhr_film.onload = (ev)=>{
        if(xhr_film.readyState !== XMLHttpRequest.DONE) return;
        if(xhr_film.status==200){
            resultContainer.innerHTML = xhr_film.responseText;
            // window.history.replaceState(null, document.title, '/search?'+params.toString());
        }
    }

    //TODO: handle pagination
}

search.addEventListener('input', async (ev)=>{
    ev.preventDefault();
    fetchResults(search_title=ev.target.value);
})