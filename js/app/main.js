/**
 * Created by m.soza on 25.02.2016.
 */
var Session = {
    data: null,
    view: {}
};

require.config({
    urlArgs: "ver=1.0.5",
    paths: {
        "jquery": "vendor/jquery/dist/jquery.min",
        "jqueryui": "vendor/jquery-ui-1.11.4/jquery-ui.min",
        "bootstrap": "vendor/bootstrap/bootstrap.min",
        "underscore": "vendor/underscore-amd/underscore-min",
        "underscore-string" : 'vendor/underscore.string.min',
        "backbone": "vendor/backbone-amd/backbone-min",
        "validator": "vendor/bootstrap-validator/bootstrapValidator.min",
        "tinymce": "vendor/tinymce/tinymce.min",
        "tinymce.jquery": "vendor/tinymce/jquery.tinymce.min",
        "text": "vendor/requirejs/text",
    }
});

require(['views/app'], function(AppView){
    (new AppView).start();
});