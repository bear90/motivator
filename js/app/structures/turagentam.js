/**
 * Created by m.soza on 25.02.2016.
 */
define([
], function(RegisterView){

    var Index = Backbone.View.extend({

        events: {
            'click .show-list': 'showList',
        },

        showList: function(e){
            e.preventDefault();

            this.$(e.target).siblings('ul').toggleClass('hidden');
        },

        render: function(){

        }
    });

    return Index;
});