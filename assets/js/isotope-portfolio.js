import Isotope from "isotope-layout";
let elem = document.querySelector('.grid');

var iso = new Isotope( elem, {
    // options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
});

var filtersElem = document.querySelector('.project-filters');
filtersElem.addEventListener( 'click', function( event ) {
    // only work with buttons
    //if ( !matchesSelector( event.target, 'button' ) ) {
    //    return;
    //}
    var filterValue = event.target.getAttribute('data-filter');
    // use matching filter function

    iso.arrange({ filter: filterValue });
});



