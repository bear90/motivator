/**
 * Created by m.soza on 17.06.2016.
 */
define([
    "tinymce",
    "tinymce.jquery",
    'validator'
], function () {
    var TextView = Backbone.View.extend({

        render: function(){
            $('textarea.tiny-text').tinymce({
                content_css: '/css/bootstrap.min.css,/css/admin-tiny.css',
                height : 400,
                menubar: false,
                statusbar: false,
                plugins: [
                    'autolink link image'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
                setup: function(editor) {

                    /**/
                    /*editor.on('init', function(ed) {
                        /!*if($(ed.target.targetElm).hasClass('hidden'))
                         {
                         tinymce.get(ed.target.id).hide();
                         }*!/
                    });

                    editor.on('change', function(e) {
                        var $form = $(e.target.editorContainer).closest('form');

                        if($form.data('changed'))
                        {
                            return false;
                        }

                        $form.find('.info').text('Предложение от турагента');
                        $form.data('changed', true);
                    });
                    editor.on('keyup', function(e, a, b) {
                        var $form = $(editor.editorContainer).closest('form');
                        $form.bootstrapValidator('revalidateField', 'description');
                    });*/
                }
            });
        }
    });
    return TextView;
});