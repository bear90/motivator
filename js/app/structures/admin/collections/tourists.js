define([
    'backbone'
], function(Backbone){

    return Backbone.Collection.extend({
        url: function(){
            return '/api/search-tourist';
        }
    });
});