//this array has the path to the pictures in the Img folder that we used for the slide show
const arrayImg =["./img/kitchen.jpg", "./img/hall.jpg", "./img/passage.jpg", "./img/zinc.jpg", './img/bathroom.jpg'];

//initializing the the slide slow element so we cabn pass the pictures to it
const side_image = document.querySelector("#insertImgSlide");


// Slide show
let counter =0;
setInterval(() => {
    if(counter < arrayImg.length){
        side_image.style.backgroundImage = `url('${arrayImg[counter]}')`;
        counter++;
    }else{
        counter = 1;
        side_image.style.backgroundImage = `url('${arrayImg[counter]}')`;
    }
}, 2000);

