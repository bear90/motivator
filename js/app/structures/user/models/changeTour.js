define([
    'backbone'
], function(Backbone){

    return Backbone.Model.extend({
        url: function(){
            return '/api/calculate-change-tour/' + Session.data.managerId;
        }
    });
});