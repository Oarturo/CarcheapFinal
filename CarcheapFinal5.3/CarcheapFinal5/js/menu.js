const photo = document.querySelector('.photo');
const menu = document.querySelector('.menu-navegacion');

//console.log(menu)
//console.log(photo)


photo.addEventListener('click', ()=>{
    menu.classList.toggle("spread")
})


window.addEventListener('click', e=>{
    if(menu.classList.contains('spread')
      && e.target !=menu && e.target !=photo){
        menu.classList.toggle("spread")
    }
})