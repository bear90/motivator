define([], function(){
    var tourist = Backbone.Model.extend({
        url: 'api/tourist'
    });

    return tourist
});