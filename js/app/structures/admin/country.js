/**
 * Created by m.soza on 31.06.2016.
 */
 define([
    'backbone',
], function(Backbone) {
    return Backbone.View.extend({

        events: {
            'click .btn-danger' : 'clickBtnDanger'
        },

        clickBtnDanger: function(e){
            return confirm('Вы уверены?')
        }
        
    });
});
