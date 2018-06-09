function initMap() {
    var mapCenter = {lat: 9.826333, lng: -83.979851};
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: mapCenter,
    });
    var marker = new google.maps.Marker({
    position: mapCenter,
    map: map,
    draggable: true
    });
    
    google.maps.event.addDomListener(window, 'load', initMap);
    google.maps.event.addListener(marker, 'dragend', function(evt){
        $("#Latitude").val(marker.getPosition().lat());
        $("#Longitude").val(marker.getPosition().lng());
    });
}


var BeFormWizard = function() {
    // Init Wizard defaults
    var initWizardDefaults = function(){
        jQuery.fn.bootstrapWizard.defaults.tabClass         = 'nav nav-tabs';
        jQuery.fn.bootstrapWizard.defaults.nextSelector     = '[data-wizard="next"]';
        jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]';
        jQuery.fn.bootstrapWizard.defaults.firstSelector    = '[data-wizard="first"]';
        jQuery.fn.bootstrapWizard.defaults.lastSelector     = '[data-wizard="lsat"]';
        jQuery.fn.bootstrapWizard.defaults.finishSelector   = '[data-wizard="finish"]';
        jQuery.fn.bootstrapWizard.defaults.backSelector     = '[data-wizard="back"]';
    };

    // Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    var initWizardSimple = function(){
        jQuery('.js-wizard-simple').bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                var percent = ((index + 1) / navigation.find('li').length) * 100;

                // Get progress bar
                var progress = navigation.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({ width: percent + 1 + '%' });
                }
            },
            onFinish: function(e) {
                //e.pre
                //alert('caca');
            }
        });
    };
    return {
        init: function () {
            // Init Wizard Defaults
            initWizardDefaults();

            // Init Form Simple Wizard
            initWizardSimple();

        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormWizard.init(); });
