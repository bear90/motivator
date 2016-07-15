/**
 * Created by m.soza on 15.07.2016.
 */
define([
    'backbone',
    'text!structures/touragentam-dashboard/templates/changeTour.html'
], function (Backbone, changeTourTmpl) {

    return Backbone.View.extend({

        template: _.template(changeTourTmpl),
        model: null,

        initialize: function(options){
            this.model = options.model;

            //initialize events
            this.model.on('sync', this.render, this);
        },

        render: function() {
            this.$el.html(this.template(this.model.attributes));

            return this;
        }
    });

});