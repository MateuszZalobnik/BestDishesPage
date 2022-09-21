const addOpinionWindow = document.querySelector('.addOpinion');
const exitBtn = document.querySelector('.addOpinion__exitBtn');
const addOpinionBtn = document.querySelector('.addOpinionBtn');

const sliderFlavour = document.querySelector('.sliderFlavour');
const sliderService = document.querySelector('.sliderService');
const sliderPrice = document.querySelector('.sliderPrice');

const flavourRating = document.querySelector('.flavourRating');
const serviceRating = document.querySelector('.serviceRating');
const priceRating = document.querySelector('.priceRating');


exitBtn.addEventListener('click', () => {
addOpinionWindow.style.display = "none";
});

addOpinionBtn.addEventListener('click', () => {
    addOpinionWindow.style.display = "block";
});

sliderFlavour.addEventListener('input', (e) => {
    flavourRating.innerHTML = e.target.value;
});
sliderService.addEventListener('input', (e) => {
    serviceRating.innerHTML = e.target.value;
});
sliderPrice.addEventListener('input', (e) => {
    priceRating.innerHTML = e.target.value;
});