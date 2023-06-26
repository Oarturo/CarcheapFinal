const imagenes = document.querySelectorAll('.img-galeria')
const imagenesLight = document.querySelector('.agregar-imagen')
const contenedorLight = document.querySelector('.imagen-light')
const photo1 = document.querySelector('.photo');

imagenes.forEach(imagen =>{
    imagen.addEventListener('click', ()=>{
       aparecerImagen(imagen.getAttribute('src'))
       
    })

})

contenedorLight.addEventListener('click', (e)=>{
    if(e.target !== imagenesLight){
        contenedorLight.classList.toggle('show')
        imagenesLight.classList.toggle('showImage')
        photo.getElementsByClassName.opacity = '1'
    }

})


const aparecerImagen = (imagen)=>{
    imagenesLight.src = imagen;
    contenedorLight.classList.toggle('show')
    imagenesLight.classList.toggle('showImage')
    photo.getElementsByClassName.opacity = '0'

}