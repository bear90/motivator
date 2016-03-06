/**
 * Created by m.soza on 25.02.2016.
 */
require.config({
    paths: {
        "jquery": "vendor/jquery/dist/jquery.min",
        "jqueryui": "vendor/jquery-ui-1.11.4/jquery-ui.min",
        "bootstrap": "vendor/bootstrap/bootstrap.min",
        "underscore": "vendor/underscore-amd/underscore-min",
        "backbone": "vendor/backbone-amd/backbone-min",
        "validator": "vendor/bootstrap-validator/bootstrapValidator.min"
    }
});

require(['views/app'], function(AppView){
    (new AppView).start();
});