/**
 * Created by m.soza on 15.07.2016.
 */
define([
    'backbone',
    'text!structures/touragentam-dashboard/templates/choiceTour.html'
], function (Backbone, choiceTourTmpl) {

    return Backbone.View.extend({

        template: _.template(choiceTourTmpl),
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