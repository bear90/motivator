define([
    'structures/user/views/editYourTour',
    'structures/user/views/changeYourTour',
    'structures/user/views/changeAndPaidYourTour',
    'validator',
], function(editYourTourView, changeYourTourView, changeAndPaidYourTourView) {

    var view = Backbone.View.extend({

        viewEditYourTour: null,
        viewChangeYourTour: null,

        events: {
            "click button.edit": "editOffer",
            "click button.change": "changeOffer",
            "click button.changeAndPaid": "changeAndPaidOffer",
            "click button.confirm": "onClickConfirm",
            "click button.paid": "paidOffer",
            "click a.more": "onClickMore",
        },

        initialize: function() {

            this.viewEditYourTour = new editYourTourView({
                el: '#your-tour .editBlock'
            });

            this.viewChangeYourTour = new changeYourTourView({
                el: '#your-tour .changeBlock'
            });

            this.viewchangeAndPaidYourTour = new changeAndPaidYourTourView({
                el: '#your-tour .changeAndPaidBlock'
            });
                
            $(window).on('beforeunload', $.proxy(this.leavePage, this));
        },

        leavePage: function(e){
            if($('.end-sell .top').hasClass('pulse'))
            {
                return 'Таймер не установлен. Проверьте работу счётчика!';
            }
        },

        onClickConfirm: function (e) {
            $('.viewBlock.form').toggleClass('hidden');
            $('.viewBlock.paid').toggleClass('hidden');
        },

        paidOffer: function (e) {
            var confirmed = $('#confirmation').is(':checked');
            if(confirmed && confirm("Вы уверены что хотите подтвердить оплату?"))
            {
                var touristId = this.$(e.target).closest('.our-tour').data('id');
                window.location = '/user/confirmpaid/' + touristId;
            }
        },

        editOffer: function(e)
        {
            var $item = this.$(e.target).closest('.our-tour');

            switch (true) {
                case $item.hasClass('edit'):
                    $item.removeClass('edit').addClass('view');
                    break;

                default:
                    $item.removeClass('view change changeAndPaid').addClass('edit');
                    break;
            }
        },

        changeOffer: function(e)
        {
            var $item = this.$(e.target).closest('.our-tour');

            switch (true) {
                case $item.hasClass('change'):
                    $item.removeClass('change').addClass('view');
                    break;

                default:
                    $item.removeClass('view edit changeAndPaid').addClass('change');
                    break;
            }
        },

        changeAndPaidOffer: function(e)
        {
            var $item = this.$(e.target).closest('.our-tour');

            switch (true) {
                case $item.hasClass('changeAndPaid'):
                    $item.removeClass('changeAndPaid').addClass('view');
                    break;

                default:
                    $item.removeClass('view edit change').addClass('changeAndPaid');
                    break;
            }
        },

        onClickMore: function(e){
            e.preventDefault();
            
            var $row = $(e.target).closest('.viewBlock');

            this.$el.find('.hidden-row').toggle();
        },

        render:  function (){
            this.viewEditYourTour.render();
            this.viewChangeYourTour.render();
            this.viewchangeAndPaidYourTour.render();
        }
    });

    return view;
});