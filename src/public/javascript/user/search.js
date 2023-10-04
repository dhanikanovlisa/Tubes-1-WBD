const form = document.forms['search-film'];
console.log(form);

const search = form.elements['title'];
const orderby = form.elements['orderby'];
const genre = form.elements['genre'];
const resultContainer = document.getElementById('result-container');

const fetchResults = (search_title=null, search_orderby=null, search_genre=null)=>{
    const xhr = new XMLHttpRequest();
    const params = new URLSearchParams();

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
    xhr.open('GET', location, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();

    xhr.onload = (ev)=>{
        if(xhr.readyState !== XMLHttpRequest.DONE) return;
        if(xhr.status==200){
            resultContainer.innerHTML = xhr.responseText;
            // window.history.replaceState(null, document.title, '/search?'+params.toString());
        }
    }
}

search.addEventListener('input', async (ev)=>{
    ev.preventDefault();
    fetchResults(search_title=ev.target.value);
})