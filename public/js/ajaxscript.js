
$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();


    //display modal form for creating new project *********************
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmProducts').trigger("reset");
        $('#myModal').modal('show');
    });



    //display modal form for project EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var project_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + project_id,
            success: function (data) {
                console.log(data);
                $('#project_id').val(data.id);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new project / update existing project ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        var formData = {
            name: $('#name').val(),
            price: $('#price').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var project_id = $('#project_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + project_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'html',
            success: function (data) {
                console.log(data);
                var project = '<tr id="project' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.price + '</td>';
                project += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                project += ' <button class="btn btn-danger btn-delete delete-project" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#projects-list').append(project);
                }else{ //if user updated an existing record
                    $("#project" + project_id).replaceWith( project );
                }
                $('#frmProducts').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete project and remove it from TABLE list ***************************
    $(document).on('click','.delete-project',function(){
        var project_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + project_id,
            success: function (data) {
                console.log(data);
                $("#project" + project_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});