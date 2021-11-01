
$(document).ready(function () {
        $("#ngayden").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0, // an cac ngay da qua
        onSelect: function (date) {
            var dt2 = $('#ngaydi');
            var minDate = $('#ngayden').datepicker('getDate');
            dt2.datepicker('option', 'minDate', minDate);
            $('#ngayden').datepicker('option', 'minDate', minDate);
        }
        });
        $('#ngaydi').datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true
        });
});
