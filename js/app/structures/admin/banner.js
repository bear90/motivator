/**
 * Created by m.soza on 31.06.2016.
 */
define([
    'backbone',
    'structures/admin/views/imageUploader'
], function(Backbone, imageUploader) {
    return Backbone.View.extend({

        uploader: null,

        events: {
            'click .upload-image' : 'onClickUpload'
        },

        initialize: function(){
            this.uploader = new imageUploader({"el": '#upload-banner'});
        },

        onClickUpload: function(e){
            e.preventDefault();

            this.uploader.openFileDialog($(e.target).attr('href'));
        }

    });
});
