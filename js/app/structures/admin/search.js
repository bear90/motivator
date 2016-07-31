/**
 * Created by m.soza on 31.06.2016.
 */
 define([
    'backbone',
    'structures/admin/collections/tourists',
    'structures/admin/views/searchTourist',
], function(Backbone, touristCollection, searchTouristView) {
    return Backbone.View.extend({

        collectionTourist: null,
        viewSearchResult: null,

        events: {
            'submit form' : 'onSubmit'
        },

        initialize: function(){

            var self = this;

            // initialize models
            this.collectionTourist = new touristCollection;

            // initialize views
            this.viewSearchResult = new searchTouristView({
                el: '#search-results',
                collection: this.collectionTourist
            });
        },

        onSubmit: function(e){
            e.preventDefault();

            var $form = $(e.target);
            var isAllEmpty = true;

            _.each(['touristId', 'touristLastName', 'touristFirstName', 'touristMiddleName', 'tourCity'], $.proxy(function(name){
                isAllEmpty = isAllEmpty && this.$('input[name='+name+']').val() == '' ;
            }, this));

            if (isAllEmpty) {
                alert("Заполните хотя бы одно поле для поиска!");
                return false;
            }

            this.viewSearchResult.clear();

            this.collectionTourist.fetch({data: {
                touristId:          $form.find('input[name=touristId]').val(),
                touristLastName:    $form.find('input[name=touristLastName]').val(),
                touristFirstName:   $form.find('input[name=touristFirstName]').val(),
                touristMiddleName:  $form.find('input[name=touristMiddleName]').val(),
                tourCity:           $form.find('input[name=tourCity]').val()
            }});
        }
        
    });
});