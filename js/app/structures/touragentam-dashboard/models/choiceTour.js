define([
    'backbone'
], function(Backbone){

    return Backbone.Model.extend({
        url: function(){
            return '/api/calculate-choice-tour/' + Session.data.managerId;
        }
    });
});