/**
 * Created by m.soza on 31.07.2016.
 */
define([
    'backbone',
    'text!structures/admin/templates/searchTourist.html',
], function (Backbone, searchTouristTmpl) {

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
            console.log('asd');
            this.$el.html(this.template({
                'tourists': this.collection
            })).removeClass('hidden');

            return this;
        },
    });

});