/*
 *  Document   : be_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */

var BeFormValidation = function() {
    // Init Material Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationMaterial = function(){
        jQuery('.js-validation-material').validate({
            ignore: [],
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-input').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-input').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-input').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'first_name': {
                    required: true,
                    maxlength: 255
                },
                'last-name': {
                    required: true,
                    maxlength: 255
                },
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 5
                },
            },
        });
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormValidation.init(); });
