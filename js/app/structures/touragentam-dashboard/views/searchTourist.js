/**
 * Created by m.soza on 31.07.2016.
 */
define([
    'backbone',
    'text!structures/touragentam-dashboard/templates/searchTourist.html',
], function (Backbone, searchTouristTmpl, _s) {

    return Backbone.View.extend({

        template: _.template(searchTouristTmpl),
        collection: null,

        initialize: function(options){
            this.collection = options.collection;

            //initialize events
            this.collection.on('sync', this.render, this);
        },

        clear: function(){
            this.$el.html('').addClass('hidden');

            return this;
        },

        render: function() {

            this.$el.html(this.template({
                'tourists': this.collection
            })).removeClass('hidden');

            return this;
        },

        clear: function(){
            this.$el.html('');

            return this;
        },
    });

});