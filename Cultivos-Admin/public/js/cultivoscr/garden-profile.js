function initMap() {
    var uluru = { lat: 9.826333, lng: -83.979851 };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: uluru,
        disableDefaultUI: true,
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
    var map2 = new google.maps.Map(document.getElementById('map2'), {
        zoom: 13,
        center: uluru,
        disableDefaultUI: true,
    });
    var marker2 = new google.maps.Marker({
        position: uluru,
        map: map2,
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}

function openMapModal() {
    jQuery('#mapModal').modal('show');
}

function openFruitModal() {
    jQuery('#fruitModal').modal('show');
}

function addFavorite(){
    // TODO: Add Garden to User's favorite in DB
    Codebase.layout('header_loader_on');
    setTimeout(function(){
        swal(
            '¡Añadido a tus Favoritos!',
            'Se ha añadido correctamente a tus favoritos.',
            'success'
          );
          Codebase.layout('header_loader_off');
          document.getElementById("removeFavoriteButton").style.display = '';
          document.getElementById("addFavoriteButton").style.display = 'none';
    }, 2000); 
}

function removeFavorite(){
    // TODO: Add Garden to User's favorite in DB
    Codebase.layout('header_loader_on');
    setTimeout(function(){
        swal(
            '¡Eliminado de tus Favoritos!',
            'Se ha eliminado correctamente de tus favoritos.',
            'success'
          );
          Codebase.layout('header_loader_off');
          document.getElementById("removeFavoriteButton").style.display = 'none';
          document.getElementById("addFavoriteButton").style.display = '';
    }, 2000); 
}

var BeCompRating = function() {
    // Init Rating
    var initRating = function(){
        // Set Default options
        jQuery.fn.raty.defaults.starType    = 'i';
        jQuery.fn.raty.defaults.hints    = ['Deficiente','Aceptable','Bueno','Muy Bueno','Excelente'];
        // Init Raty on .js-rating class
        jQuery('.js-rating-read').each(function(){
            var ratingEl = jQuery(this);

            ratingEl.raty({
                score: ratingEl.data('score') || 0,
                readOnly: true,
                starOff: ratingEl.data('star-off') || 'fa fa-fw fa-star text-muted',
                starOn: ratingEl.data('star-on') || 'fa fa-fw fa-star text-warning'
            });
        });
        jQuery('.js-rating').each(function(){
            var ratingEl = jQuery(this);

            ratingEl.raty({
                score: ratingEl.data('score') || 0,
                starOff: ratingEl.data('star-off') || 'fa fa-fw fa-star text-muted',
                starOn: ratingEl.data('star-on') || 'fa fa-fw fa-star text-warning'
            });
        });
    };

    return {
        init: function () {
            initRating();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ 
    BeCompRating.init();
    Codebase.helpers('slick');
});

