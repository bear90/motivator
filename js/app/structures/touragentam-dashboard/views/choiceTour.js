/**
 * Created by m.soza on 15.07.2016.
 */
define([
    'backbone',
    'text!structures/touragentam-dashboard/templates/choiceTour.html',
    'underscore-string'
], function (Backbone, choiceTourTmpl, _s) {

    return Backbone.View.extend({

        template: _.template(choiceTourTmpl),
        model: null,

        initialize: function(options){
            this.model = options.model;

            //initialize events
            this.model.on('sync', this.render, this);
            // merge underscore-string
            _.mixin(_s.exports());
        },

        render: function() {
            this.$el.html(this.template(this.model.attributes));

            return this;
        },

        clear: function(){
            this.$el.html('');

            return this;
        },
    });

});