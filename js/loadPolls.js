$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "../controller/loadPolls.php",
        success: function(data) {
            data = JSON.parse(data);
            if(data.length == null) {
                $('#dd-polls').append($('<option/>').attr("value", data.poll_id).text(data.poll_head));
            } else {
                $.each(data, function(i, option) {
                    $('#dd-polls').append($('<option/>').attr("value", option.poll_id).text(option.poll_head));
                });
            }
        }
    });
    $('#dd-polls').change(function(){
        var pollID = this.value;
        $.ajax({
            type: "GET",
            url: "../controller/loadPositions.php",
            data: { "poll_id": pollID },
            success: function(data) {
                data = JSON.parse(data);
                $('#dd-positions').find('option:not(:first)').remove();
                if(data.length == null) {
                    $('#dd-positions').append($('<option/>').attr("value", data.position_id).text(data.position_name));
                } else {
                    $.each(data, function(i, option) {
                        $('#dd-positions').append($('<option/>').attr("value", option.position_id).text(option.position_name));
                    });
                }
            }
        });
    });
});