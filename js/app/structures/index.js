/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'structures/registration/view',
    'bootstrap'
], function(RegisterView){

    var Index = Backbone.View.extend({

        /*events: {
            "click #btn-continue-1": "renderStep2",
            "click #btn-continue-2": "renderStep3",
            "click #btn-continue-3": "renderStep4",
            "click #btn-continue-4": "renderStep5",
            "click #btn-info-board-issue-2": "register"
        },*/

        render: function(){
            
            (new RegisterView({
                el: '#register-block'
            })).render();
        }
    });

    return Index;
});