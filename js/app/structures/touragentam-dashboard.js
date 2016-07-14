/**
 * Created by m.soza on 28.03.2016.
 */
define([
    'structures/touragentam-dashboard/raschet'
], function(raschetView){

    var Index = Backbone.View.extend({



        events: {
            'click .tourists-tabs a': 'showTourists',
            'submit form.searchTourist' : 'submitSearchTourist'
        },

        submitSearchTourist: function(e) {

            var isAllEmpty = true;

            _.each(['touristId', 'touristLastName', 'touristFirstName', 'touristMiddleName', 'tourCity'], $.proxy(function(name){
                isAllEmpty = isAllEmpty && this.$('input[name='+name+']').val() == '' ;
            }, this));

            if (isAllEmpty) {
                alert("Заполните хотя бы одно поле для поиска!");
                return false;
            }
        },

        showTourists: function(e){
            e.preventDefault();

            var $el = this.$(e.target);
            var className = $el.attr('href').substr(1);

            this.$('.users-block:not(.hidden)').addClass('hidden');
            this.$('.users-block.' + className).removeClass('hidden');
        },

        render: function(){
            (new raschetView({el: '.tab4.raschet'})).render();
        }
    });

    return Index;
});