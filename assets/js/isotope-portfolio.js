import Isotope from "isotope-layout";
let elem = document.querySelector('.grid');

var iso = new Isotope( elem, {
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
});

var filtersElem = document.querySelector('.project-filters');
filtersElem.addEventListener( 'click', function( event ) {
    var filterValue = event.target.getAttribute('data-filter');
    iso.arrange({ filter: filterValue });
});

window.onload = function() {
    iso.arrange({ filter: '*' });
};

