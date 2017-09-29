/**
 * Created by m.soza on 25.02.2016.
 */
var Session = {
    data: null,
    view: {}
};

require.config({
    urlArgs: "ver=1.0.19",
    paths: {
        //"jquery": "vendor/jquery/dist/jquery.min",
        "jquery": "vendor/jquery/jquery",
        "jqueryui": "vendor/jquery-ui-1.12.1/jquery-ui.min",
        //"jqueryui": "vendor/jquery-ui-1.11.4/jquery-ui.min",
        "jquery-combobox": "vendor/jquery.combobox/jquery.combobox",
        "bootstrap": "vendor/bootstrap/bootstrap.min",
        "underscore": "vendor/underscore-amd/underscore-min",
        "underscore-string" : 'vendor/underscore.string.min',
        "backbone": "vendor/backbone-amd/backbone-min",
        "validator": "vendor/bootstrap-validator/bootstrapValidator.min",
        "tinymce": "vendor/tinymce/tinymce.min",
        "tinymce.jquery": "vendor/tinymce/jquery.tinymce.min",
        "text": "vendor/requirejs/text",
        "jquery.cookie": "vendor/jquery-cookie/jquery.cookie",
    }
});

require(['views/app'], function(AppView){
    (new AppView({el: 'body'})).start();
});