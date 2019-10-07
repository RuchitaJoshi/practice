// My custom js file
$(document).ready(function() {
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#posts_list tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // $(".ajax-submit").click(function(e){
    //     e.preventDefault();
    //     // var name = "Hello";
    //     var name = $("input[name=myInput]").val();
    //     window.console.log(name);
    //     $.ajax({
    //         type:'POST',
    //         url:'/ajax',
    //         data:{name:name},
    //         success:function(data){
    //             // alert(data.success);
    //             window.console.log("success");
    //               window.location.reload();
    //         },
    //         error:function(data){
    //             window.console.log("Error");
    //         }
    //     });
    // });

    $("#myForm").submit(function(e){
        e.preventDefault();
        // console.log("Submitted");
        $.ajax({

        })
    });

    // AjaxPagination Script Starts Here - Without changing URL

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page)
        {
            $.ajax({
                url:"?page="+page,
                success:function(data)
                {
                    $('#table-data').html(data);
                }
            });
        }

    // AjaxPagination Script Ends Here


});