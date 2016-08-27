/**
 * Created by m.soza on 15.07.2016.
 */
define([
    'backbone',
    'text!structures/touragentam-dashboard/templates/newTour.html'
], function (Backbone, newTourTmpl) {

    return Backbone.View.extend({

        trackerHandler: null,
        blinkEffectHandler: null,

        template: _.template(newTourTmpl),

        events: {
            'click #alarm-message button': 'onClickCloseAlarm',
        },

        initialize: function(){
            
        },

        onClickCloseAlarm: function (){
            $('#alarm-message').fadeOut();
            this.stopPulseEffect();
        },

        informAboutNewMessage: function () {
            $('#alarm-message').fadeIn();
            $('#alarm-audio').trigger("play");
            this.startPulseEffect();
        },

        startPulseEffect: function (){
            this.blinkEffectHandler = setInterval($.proxy(function(){
                $('#alarm-message').fadeTo('slow', 0.5).fadeTo('slow', 1.0);
            }, this), 1700);
        },

        stopPulseEffect: function(){
            clearInterval(this.blinkEffectHandler);
        },

        sendCheck: function () {
            var lastId = null;

            if (this.$('.orders .item').size())
            {
                lastId = this.$('.orders .item:last').data('id');
            }

            $.ajax('/api/check-order', {dataType:'json', data:{lastId: lastId}})
                .done($.proxy(this.renderNewTours, this));
        },

        renderNewTours: function(data){
            if(this.$('.orders .item').size() == 0)
            {
                this.$('.orders .inner-block').remove();    // remove empty message
            }

            for (var i in data.new)
            {
                var attributes = data.new[i];
                var html = this.template(attributes);

                this.$('.orders').append(html);
            }

            if (data.new.length) {
                this.informAboutNewMessage();
            }
        },

        render: function() {
            if (this.$el.data('touragentId'))
            {
                this.trackerHandler = setInterval($.proxy(this.sendCheck, this), 60*1000);
            }

            return this;
        },
    });

});