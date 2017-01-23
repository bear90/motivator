/**
 * Created by m.soza on 31.06.2016.
 */
define([
    'backbone',
], function(Backbone) {
    return Backbone.View.extend({

        events: {
            'change input[type=file]' : 'onChangeFile'
        },

        $inputFile: null,

        initialize: function () {
            this.$inputFile = this.$el.find('input[type=file]');
        },

        openFileDialog: function(action){
            this.$el.attr('action', action);
            this.$inputFile.trigger('click');
        },

        onChangeFile: function(e) {
            if (this.$inputFile[0].files.length > 0) {
                this.$el.submit();
            }
        }

    });
});
