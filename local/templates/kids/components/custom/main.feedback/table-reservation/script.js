function ReservationTable(params) {
    this.areaId = params.areaId;

    $(this.init.bind(this));
}

ReservationTable.prototype = {
    init: function() {
//проверить выбрано ли время и дата
        var selectTime=false;
        $('#selecttimelabel').hide();
        $('#selectdatelabel').hide();
        $('.form_radio_group-item label').click(function() {
            $('#selecttimelabel').hide();
            selectTime=true;
            $('.form_radio_group-item .active').removeClass("active");
            this.classList.add("active");
        });

        $('#stage_two').hide();
        /*на второй шаг*/
        $('#stage-next').click(function() {
//если выбрано время
            if (selectTime) {
                var selectDate = $("#datetimepicker").val();
                if (!Date.parse(selectDate)) {
                    //нет даты

                    $('#selectdatelabel').show();
                } else {
                    //есть дата

                    $('#selectdatelabel').hide();
                    $('#stage_one').hide();
                    $('#stage_two').show();
                }
            } else {
                //если не выбрано, то показать ошибку
                if (!$('.form_radio_group-item label').is('.active') )  {
                    $('#selecttimelabel').show(); }
                var selectDate = $("#datetimepicker").val();
                if (!Date.parse(selectDate)) {
                    $('#selectdatelabel').show();
                } else {
                    $('#selectdatelabel').hide();
                }




                $('#datetimepicker').required = true;
            }

        });
        /*обратно на первый шаг*/
        $('#stage-two-prev').click(function() {
            $('#stage_one').show();
            $('#stage_two').hide();
        });

        // Убавляем кол-во по клику
        $('.quantity_inner .bt_minus').click(function() {
            let $input = $(this).parent().find('.quantity');
            let count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
        });
// Прибавляем кол-во по клику
        $('.quantity_inner .bt_plus').click(function() {
            let $input = $(this).parent().find('.quantity');
            let count = parseInt($input.val()) + 1;
            count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
            $input.val(parseInt(count));
        });
// Убираем все лишнее и невозможное при изменении поля
        $('.quantity_inner .quantity').bind("change keyup input click", function() {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
            if (this.value == "") {
                this.value = 1;
            }
            if (this.value > parseInt($(this).data('max-count'))) {
                this.value = parseInt($(this).data('max-count'));
            }
        });






    },
};