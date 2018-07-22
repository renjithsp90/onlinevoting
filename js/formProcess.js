$(document).ready(function(){
    $('#submit').click(function(){
        var type = $("#form_processor").attr("data-type");
        var data = $('#form').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            obj['type'] = type;
            obj['gender'] = $('input[name="gender"]:checked').val();
            obj['method'] = 'add';
            return obj;
        }, {});
        console.log("DATA", data);
        $.ajax({
            type: "GET",
            url: "../controller/UsersController.php",
            data: data,
            success: function(data) {
                alert((data));
            }
        });
    });
})