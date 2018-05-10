function setActive() {
    aObj = document.getElementById('navbarNav').getElementsByTagName('a');
    for(i=0;i<aObj.length;i++) { 
        if(document.location.href.indexOf(aObj[i].href)>=0) {
            aObj[i].className='nav-link active';
        }
    }
}

setActive();