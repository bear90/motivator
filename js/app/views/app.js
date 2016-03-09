/**
 * Created by m.soza on 25.02.2016.
 */
define(['backbone'], function(Backbone){

    var App = Backbone.View.extend({

        start: function(){
            var container = $('section[data-structure]');
            var structure = container.data('structure');

            if(structure) {

                require(['structures/' + structure], function(StructureMainView) {

                    if(StructureMainView) {

                        var view = new StructureMainView({
                            el: container
                        });

                        // Start dispatching
                        view.render();
                    }
                });
            }

            $('.ms_tabs a.tab').on('click', function(e){
                e.preventDefault();

                var $el = $(e.target);
                var $wrapper = $el.closest('.ms_tabs');
                var prevTab = $wrapper.data('selected');
                var curTab = $el.attr('href').substr(1);

                if(prevTab != curTab)
                {
                    $wrapper.find('.tabs-link a.tab[href="#' + prevTab + '"]').removeClass('active');
                    $wrapper.find('.tabs-link a.tab[href="#' + curTab + '"]').addClass('active');
                    $wrapper
                        .removeClass($wrapper.data('selected'))
                        .addClass(curTab)
                        .data('selected', curTab);
                }
            });

            $('.hide-block').on('click', function(e){
                e.preventDefault();

                var $el = $(e.target);
                var $wrapper = $el.closest('#wrapper');

                $wrapper.find('.tabs-link a').removeClass('active');
                $wrapper.removeClass($wrapper.data('selected'));
                $wrapper.data('selected', '');
            });
        }
    });

    return App;
});