$(document).ready(function() {

$('.dele').click(function() {
    // get data
    var EquipmentIDdel = $(this).attr('id');
    var EquipmentName = $(this).attr('name');

    //set value to modal
    $('#EquipmentIDdel').val(EquipmentIDdel);
    $('#EquipmentName').val(EquipmentName);

    // var textbody = $('#textbd');
    // $textbody.text('ต้องการลบ ' + EquipmentIDdel + 'จริงหรือไม่ ?');

    $('#fromDel').modal('show');

})

});