define([], function(){
    var model = Backbone.Model.extend({

        url: function(){
            return '/api/choice-tour-raschet/' + Session.data.managerId;
        }
    });

    return model;
});