$( document ).ready(function() {


    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;


    // manageData();
    //
    //
    // /* manage data list */
    // function manageData() {
    //     $.ajax({
    //         dataType: 'json',
    //         // url: url + 'api/getData.php',
    //         url: '/posts',
    //         data: {page: page}
    //     }).done(function (data) {
    //         total_page = Math.ceil(data.total / 10);
    //         current_page = page;
    //
    //
    //         $('#pagination').twbsPagination({
    //             totalPages: total_page,
    //             visiblePages: current_page,
    //             onPageClick: function (event, pageL) {
    //                 page = pageL;
    //                 if (is_ajax_fire != 0) {
    //                     getPageData();
    //                 }
    //             }
    //         });
    //
    //
    //         manageRow(data.data);
    //         is_ajax_fire = 1;
    //
    //
    //     });
    //
    //
    // }


    /* Get Page Data*/
    // function getPageData() {
    //     $.ajax({
    //         dataType: 'json',
    //         // url: url + 'api/getData.php',
    //         url: '/posts',
    //         data: {page: page}
    //     }).done(function (data) {
    //         manageRow(data.data);
    //     });
    // }
    //
    //
    // /* Add new Item table row */
    // function manageRow(data) {
    //     var rows = '';
    //     $.each(data, function (key, value) {
    //         rows = rows + '<tr>';
    //         rows = rows + '<td>' + value.title + '</td>';
    //         rows = rows + '<td>' + value.description + '</td>';
    //         rows = rows + '<td data-id="' + value.id + '">';
    //         rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
    //         rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
    //         rows = rows + '</td>';
    //         rows = rows + '</tr>';
    //     });
    //
    //
    //     $("tbody").html(rows);
    // }


    // /* Create new Item */
    // $(".crud-submit").click(function (e) {
    //     e.preventDefault();
    //     // var form_action = $("#create-item").find("form").attr("action");
    //     var title = $("#create-item").find("input[name='title']").val();
    //     var description = $("#create-item").find("textarea[name='description']").val();
    //
    //     window.console.log(title);
    //
    //     if (title != '' && description != '') {
    //         $.ajax({
    //             dataType: 'json',
    //             type: 'POST',
    //             url: '/posts',
    //             data: {title: title, description: description}
    //         }).done(function (data) {
    //             $("#create-item").find("input[name='title']").val('');
    //             $("#create-item").find("textarea[name='description']").val('');
    //             getPageData();
    //             $(".modal").modal('hide');
    //             toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
    //         });
    //     } else {
    //         alert('You are missing title or description.')
    //     }
    //
    //
    // });

    /* New try to create post */
    $('#add-post').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        var formData = {
            user_id: 1,
            title: $('#title').val(),
            body: $('#body').val(),
        };

        var type = "POST";
        var post_id = $('#post-id').val();
        var my_url = '/posts';
        window.console.log(formData);

        //
        // var token = $("meta[name='csrf-token']").attr("content");
        // var title = $("#create-item").find("input[name='title']").val();
        // var description = $("#create-item").find("textarea[name='body']").val();

        $.ajax({
            url: my_url,
            type: type,
            data: formData,
            dataType: 'json',
            success: function (data) {

                window.console.log(data);
                // window.console.log("Post Created Successfully");
                var post = '<tr data-body=' + data.body + ' data-title=' + data.title + ' id=' + data.id + '><td>' + data.title + '</td><td>' + data.body + '</td>';
                //post += '<td><a href="'+ my_url +'" class="delete-user-row-with-ajax-button"><span class="glyphicon glyphicon-remove"></span></a></td></tr>';


                post += '<td><button class="btn btn-info btn-xs btn-edit">Edit</button> <button class="btn btn-danger btn-xs btn-delete">Delete</button></td>';

                $('#posts_list').append(post);

                // var markup = "<tr><td>title</td><td>description</td></tr>";
                // $("#table1").append(markup);
                window.console.log('Data created successfully');
                $(".modal").modal('hide');
                // window.location.reload();
            },
            error: function () {
                window.console.log("Error ");
            }
        })
    });

    /* Cancel button for updating post */
    $("body").on("click", ".btn-cancel", function(){
        var title = $(this).parents("tr").attr('data-title');
        var body = $(this).parents("tr").attr('data-body');

        $(this).parents("tr").find("td:eq(0)").text(title);
        $(this).parents("tr").find("td:eq(1)").text(body);

        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-update").remove();
        $(this).parents("tr").find(".btn-cancel").remove();
    });

    /* Edit button for updating post */
    $("body").on("click", ".btn-edit", function(){
        var title = $(this).parents("tr").attr('data-title');
        var body = $(this).parents("tr").attr('data-body');

        $(this).parents("tr").find("td:eq(0)").html('<input name="edit_title" value="'+title+'">');
        $(this).parents("tr").find("td:eq(1)").html('<input name="edit_body" value="'+body+'">');

        $(this).parents("tr").find("td:eq(2)").prepend("<button class='btn btn-info btn-xs btn-update'>Update</button><button class='btn btn-warning btn-xs btn-cancel'>Cancel</button>")
        $(this).hide();
    });

    /* Updating Existing Post */
    $("body").on("click", ".btn-update", function(e){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        e.preventDefault();

        var title1 = $(this).parents("tr").find("input[name='edit_title']").val();
        var body1 = $(this).parents("tr").find("input[name='edit_body']").val();

        // window.console.log(title1);

        var formData = {
            user_id: 1,
            title: title1,
            body: body1,
        }
        var type = "PUT";
        // var post_id = $('#post-id').val();
        var post_id = $(this).parents("tr").attr('id');
        var my_url = '/posts/'+ post_id;
        // window.console.log(post_id);

        $(this).parents("tr").find("td:eq(0)").text(title1);
        $(this).parents("tr").find("td:eq(1)").text(body1);

        $(this).parents("tr").attr('data-title', title1);
        $(this).parents("tr").attr('data-body', body1);

        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-cancel").remove();
        $(this).parents("tr").find(".btn-update").remove();

        $.ajax({
            url: my_url,
            type: type,
            data: formData,
            dataType: 'json',
            success: function () {
                window.console.log("Post Updated Successfully");
            },
            error: function () {
                window.console.log("Error ");
            }
        })
    });

    /* Delete Post (delete-user-row-with-ajax-button) */
    $('.btn-delete').bootstrap_confirm_delete(
        {
            callback: function (event) {
                var link = event.data.originalObject;
                var postid = link.closest('tr').attr('id');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                    {
                        url: '/posts/' + postid,
                        type: 'POST',
                        data: {
                            "id": postid,
                            "_token": token,
                            "_method": 'delete',
                        },
                        success: function (post) {
                            link.closest('tr').remove();

                            // window.console.log(post);
                            // window.console.log(post.title);

                            // console.log("it works");

                            // $.each(data, function (index, value) {
                            //     window.console.log(index);
                            //     window.console.log(value.title);
                            // });
                            window.location.reload();
                        },
                        error: function () {
                            window.console.log('Could not delete data');
                        }
                    });
            }
        }
    );
});