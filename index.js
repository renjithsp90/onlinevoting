$(document).ready(function () {
    let searchParams = new URLSearchParams(window.location.search);
    var tblPolls = $('#tbl-polls');
    var tblResult = $('#tbl-result');
    var ddPolls = $('#dd-polls');
    var ddPositions = $('#dd-positions');
    if (tblPolls.length) {
        var data = { "method": "select", "type": "poll" };
        $.ajax({
            type: "GET",
            url: "controller/PollsController.php",
            data: data,
            success: function (data) {
                tblPolls.hide();
                data = JSON.parse(data);
                console.log("DATA", data);
                var poll = data[0];
                var columns = [];
                for (var property in poll) {
                    if (property != 'admin_id') {
                        columns.push({
                            data: property
                        });
                    }
                    tblPolls.show();
                }
                columns.push({
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button class='view_result'>View Result</button>"
                });
                var table;
                /*if ($.fn.dataTable.isDataTable('#tbl-polls')) {
                    table = tblPolls.DataTable();
                } else {*/
                    table = tblPolls.DataTable({
                        data: data,
                        "processing": true,
                        "destroy": true,
                        columns: columns
                    });
                //}
                $('#tbl-polls tbody').on('click', 'button.view_result', function () {
                    var src = table.row($(this).parents('tr')).data();
                    window.location = "view_result.php?poll_id=" + src['poll_id'];
                });
            }
        });
    }
    if(ddPolls.length) {
        $.ajax({
            type: "GET",
            url: "controller/PollsController.php",
            data: { "method": "select" },
            success: function (data) {
                console.log("DATA", data);
                data = JSON.parse(data);
                ddPolls.find('option:not(:first)').remove();
                if (data.length == null) {
                    ddPolls.append($('<option/>').attr("value", data.poll_id).text(data.poll_head));
                } else {
                    $.each(data, function (i, option) {
                        ddPolls.append($('<option/>').attr("value", option.poll_id).text(option.poll_head));
                    });
                }
            }
        });
    }
    ddPolls.change(function () {
        var pollID = this.value;
        $.ajax({
            type: "GET",
            url: "controller/PositionsController.php",
            data: { "poll_id": pollID, "method": "select" },
            success: function (data) {
                data = JSON.parse(data);
                ddPositions.find('option:not(:first)').remove();
                $.each(data, function (i, option) {
                    if (ddPositions.length) {
                        ddPositions.append($('<option/>').attr("value", option.position_id).text(option.position_name));
                    }
                });
            }
        });
    });
    ddPositions.change(function () {
        var positionID = this.value;
        var pollID = ddPolls.val();
        var json = { "position_id": positionID, "poll_id": pollID, "type": "result", "method": "select" }
        $.ajax({
            type: "GET",
            url: "controller/PollsController.php",
            data: json,
            success: function (data) {
                tblResult.hide();
                console.log("DATA", data);
                data = JSON.parse(data);
                var poll = data[0];
                var columns = [];
                for (var property in poll) {
                    columns.push({
                        data: property
                    });
                    tblResult.show();
                }
                var table;
                /*if ($.fn.dataTable.isDataTable('#tbl-polls')) {
                    table = tblResult.DataTable();
                } else {*/
                    table = tblResult.DataTable({
                        data: data,
                        "processing": true,
                        "destroy": true,
                        columns: columns
                    });
                //}
            }
        });
    });
});