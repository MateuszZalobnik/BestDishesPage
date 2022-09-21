const left = document.querySelector('.banner__leftArrow');
const right = document.querySelector('.banner__rightArrow');

const firstBtn = document.querySelector('.banner__btn--1');
const secondBtn = document.querySelector('.banner__btn--2');
const thirdBtn = document.querySelector('.banner__btn--3');

const bannerImage = document.querySelector(".banner__image");
const changeImgTime = 5000;
let imgSrcNum = 1;

var changeImg = setInterval(turnRight, changeImgTime);

left.addEventListener('click', turnLeft);
right.addEventListener('click', turnRight);
firstBtn.addEventListener('click', function () {
    imgView(1)
});
secondBtn.addEventListener('click', function () {
    imgView(2)
});
thirdBtn.addEventListener('click', function () {
    imgView(3)
});



function turnLeft() {
    if (imgSrcNum == 1) {
        imgSrcNum = 3;
    } else {
        imgSrcNum--;
    }
    imgView(imgSrcNum);
}

function turnRight() {
    if (imgSrcNum == 3) {
        imgSrcNum = 1;
    } else {
        imgSrcNum++;
    }
    imgView(imgSrcNum);
}


function imgView(imgSrcNum) {

    switch (imgSrcNum) {
        case 1:
            secondBtn.classList.remove("banner__btn--active");
            thirdBtn.classList.remove("banner__btn--active");
            firstBtn.classList.add("banner__btn--active");
            break;

        case 2:
            firstBtn.classList.remove("banner__btn--active");
            thirdBtn.classList.remove("banner__btn--active");
            secondBtn.classList.add("banner__btn--active");
            break;

        case 3:
            secondBtn.classList.remove("banner__btn--active");
            firstBtn.classList.remove("banner__btn--active");
            thirdBtn.classList.add("banner__btn--active");
            break;

        default:
            break;
    }

    let imgSrc = '../img/banner1.jpg';
    imgSrc = '../img/banner' + imgSrcNum + '.jpg';
     bannerImage.src = imgSrc;

    clearInterval(changeImg);
    changeImg = setInterval(turnRight, changeImgTime);
}