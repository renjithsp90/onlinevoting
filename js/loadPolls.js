$(document).ready(function() {
    var ddPolls = $('#dd-polls');
    var ddPositions = $('#dd-positions');
    var ulPositions = $('#ul-positions');
    var btnAddNode = $('#btn-addNode');
    var tblCandidate = $('#tbl-candidate');
    var tblPolls = $('#tbl-polls');
    let searchParams = new URLSearchParams(window.location.search);
    var table;

    $.ajax({
        type: "GET",
        url: "../controller/PollsController.php",
        data: {"method": "select"},
        success: function(data) {
            data = JSON.parse(data);
            ddPolls.find('option:not(:first)').remove();
            if(data.length == null) {
                ddPolls.append($('<option/>').attr("value", data.poll_id).text(data.poll_head));
            } else {
                $.each(data, function(i, option) {
                   ddPolls.append($('<option/>').attr("value", option.poll_id).text(option.poll_head));
                });
            }
        }
    });
    ddPolls.change(function() {
        var pollID = this.value;
        $.ajax({
            type: "GET",
            url: "../controller/PositionsController.php",
            data: { "poll_id": pollID, "method": "select" },
            success: function(data) {
                data = JSON.parse(data);
                ddPositions.find('option:not(:first)').remove();
                if(data.length == null) {
                    if(ddPositions.length) {
                        ddPositions.append($('<option/>').attr("value", data.position_id).text(data.position_name));
                    }
                    if(ulPositions.length) {
                        ulPositions.empty();
                        $.getScript('../js/positions.js', function () {          
                            newElement(data); 
                        }); 
                    }
                } else {
                    $.each(data, function(i, option) {
                        if(ddPositions.length) {
                            ddPositions.append($('<option/>').attr("value", option.position_id).text(option.position_name));
                        }
                        if(ulPositions.length) {
                            ulPositions.empty();
                            $.getScript('../js/positions.js', function () {          
                                newElement(option); 
                            });
                        }
                    });
                }
            }
        });
    });
    btnAddNode.click(function(){
        var pollID = ddPolls.val();
        var inputValue = $('#position').val();
        $.getScript('../js/positions.js', function () {
            $.ajax({
                type: "GET",
                url: "../controller/PositionsController.php",
                data: "poll_id=" + pollID + "&position_name=" + inputValue + "&method=add" ,
                success: function(data) {
                    newElement({"position_id": data, "position_name": inputValue});
                }
            });
            $('#position').val('');          
        });
    });
    ddPositions.change(function(){
        var pollID = ddPolls.val();
        var positionID = ddPositions.val();
        if(tblCandidate.length) {
            $.ajax({
                type: "GET",
                url: "../controller/UsersController.php",
                data: { "dd-polls": pollID, "dd-positions": positionID, "type": "candidate", "method": "select" },
                success: function(data) {
                    data = JSON.parse(data);
                    var candidate = data[0];
                    var columns = [];
                    for(var property in candidate){
                            columns.push({
                                data: property
                            })
                        }
                    columns.push({
                        "targets": -1,
                        "data": null,
                        "defaultContent": "<button class='edit'>edit</button><button class='delete'>delete</button>"
                    });
                    
                    if ($.fn.dataTable.isDataTable('#tbl-candidate')) {
                        table = tblCandidate.DataTable();
                    } else {
                        table = tblCandidate.DataTable({
                            data: data,
                            "processing": true,
                            columns: columns
                        });
                    }
                    $('#tbl-candidate tbody').on( 'click', 'button.delete', function () {
                        var src = table.row( $(this).parents('tr') ).data();
                        if (confirm('Are you sure you want to delete the candidate ?')) {
                            $.ajax({
                                type: "GET",
                                url: "../controller/UsersController.php",
                                data: {"user_id" : src['user_id'], "type": "candidate", "method" : "delete"} ,
                                success: function(data) {
                                    alert(data);
                                }
                            });
                        }
                    } );
                    $('#tbl-candidate tbody').on( 'click', 'button.edit', function () {
                        var src = table.row( $(this).parents('tr') ).data();
                        window.location = "candidates.php?user_id=" + src['user_id'];
                    } );
                }
            });
        }
    });
    if(searchParams.has('user_id')) {
        var userID = searchParams.get('user_id');
        $('#fld-pollingDetails').css('display', 'none');
        $.ajax({
            type: "GET",
            url: "../controller/UsersController.php",
            data: {"user_id" : userID, "type": "user", "method" : "select"} ,
            success: function(data) {
                data = JSON.parse(data);
                $('#' + data["gender"]).attr('checked', 'checked');
                Object.keys(data).forEach(function(key) {
                    console.log(data);
                    $('#'+key).val(data[key]);
                });
            }
        });
    }
    if(tblPolls.length) {
        var userID = 32;
        $.ajax({
            type: "GET",
            url: "../controller/PollsController.php",
            data: {"method": "select", "type": "voter", "user_id": userID},
            success: function(data) {
                data = JSON.parse(data);
                console.log("DATA", data);
                var poll = data[0];
                var columns = [];
                for(var property in poll){
                        if(property != 'admin_id'){
                            columns.push({
                                data: property
                            });
                        }
                    }
                columns.push({
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button class='edit'>poll</button>"
                });
               
                if ($.fn.dataTable.isDataTable('#tbl-polls')) {
                    table = tblPolls.DataTable();
                } else {
                    table = tblPolls.DataTable({
                        data: data,
                        "processing": true,
                        columns: columns
                    });
                }
                $('#tbl-polls tbody').on( 'click', 'button.delete', function () {
                    alert('x');
                    var src = table.row( $(this).parents('tr') ).data();
            
                } );
            }
        });
    }
});