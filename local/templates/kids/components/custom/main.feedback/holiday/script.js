function Script(params) {
    this.areaId = params.areaId;

    $(this.init.bind(this));
}

Script.prototype = {
    init: function() {

            // перемотать к форме заказа
        let params = (new URL(document.location)).searchParams;
if(params.get("id")=='order_an_event')  {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#order_an_event").offset().top - $(window).height()/2
    }, 2000);
}

    },
};