const form = document.forms['search-film'];
const GETParams = new URLSearchParams(window.location.search);

const search = form.elements['title'];
search.value = GETParams.get('title');
const orderby = form.elements['orderby'];
orderby.value = GETParams.get('orderby');
const genre = form.elements['genre'];
genre.value = GETParams.get('genre');

const fetchResults = ()=>{
    const xhr = new XMLHttpRequest();
    const params = new URLSearchParams();
    params.set('title', search.value);
    params.set('orderby', orderby.value);
    params.set('genre', genre.value);

    const location = '/search/search?'+params.toString();
    xhr.open('GET', location, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();

    xhr.onload = async (ev)=>{
        if(xhr.readyState !== XMLHttpRequest.DONE) return;
        if(xhr.status==200){
            const resultContainer = document.getElementById('result-container');
            const paginationContainer = document.getElementById('pagination-container');
            const doc = new DOMParser().parseFromString(xhr.responseText, 'text/html');
            const films = doc.getElementById('cards-container').children;

            const pagination = doc.getElementById('pagination-container');

            resultContainer.innerHTML = '';
            for(film of films){
                resultContainer.innerHTML += film.outerHTML;
            }
            if(!resultContainer.innerHTML){
                resultContainer.innerHTML = 'Movie not found';
            }

            paginationContainer.innerHTML = pagination.outerHTML;
            // window.history.replaceState(null, document.title, '/search?'+params.toString());
        }
    }
}

search.addEventListener('input', async (ev)=>{
    ev.preventDefault();
    fetchResults();
});

orderby.addEventListener('change', async (ev)=>{
    ev.preventDefault();
    fetchResults();
});

genre.addEventListener('change', async (ev)=>{
    ev.preventDefault();
    fetchResults();
});