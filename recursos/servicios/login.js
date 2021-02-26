$('.carousel').carousel({
    interval: false
});

function carrouselInicio () {
    $('.carousel').carousel(0);
}

function recuperar () {
    $('.carousel').carousel('next');
}

function login () {
    $('.carousel').carousel('prev');
}