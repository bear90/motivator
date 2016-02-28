/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'structures/registration/view'
], function(RegisterView){

    var Index = Backbone.View.extend({

        render: function(){
            
            (new RegisterView({
                el: '#register-block'
            })).render();

        }
    });

    return Index;
});