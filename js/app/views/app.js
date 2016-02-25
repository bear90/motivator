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
        }
    });

    return App;
});