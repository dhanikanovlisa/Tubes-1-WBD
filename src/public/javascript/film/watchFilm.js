const videoPlayer = document.getElementById('video-player');
const updateTime = () => {
    const xhr = new XMLHttpRequest();
    const pathname = window.location.pathname.split('/');
    const filmID = pathname[pathname.length-1];

    xhr.open('POST', '/watch');
    const formData = new FormData();
    formData.append('film_id', filmID);
    formData.append('last_played_time', videoPlayer.currentTime);
    xhr.send(formData);
}

let timeoutId = null;
const delayInvoke = (fn, interval) => {
    return async () => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(()=>{fn();clearTimeout(timeoutId);timeoutId=null;}, interval);
    }
}

const delayTimeUpdate = delayInvoke(updateTime, 5000);

videoPlayer && videoPlayer.addEventListener('timeupdate', ()=>{
    if(timeoutId === null){
        delayTimeUpdate();
    }
})
