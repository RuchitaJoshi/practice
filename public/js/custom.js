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

    // AjaxPagination Script Starts Here
    // $(window).on('hashchange', function() {
    //     if (window.location.hash) {
    //         var page = window.location.hash.replace('#', '');
    //         if (page == Number.NaN || page <= 0) {
    //             return false;
    //         }else{
    //             getData(page);
    //         }
    //     }
    // });
    //
    // $(document).ready(function()
    // {
    //     $(document).on('click', '.pagination a',function(event)
    //     {
    //         event.preventDefault();
    //
    //         $('li').removeClass('active');
    //         $(this).parent('li').addClass('active');
    //
    //         var myurl = $(this).attr('href');
    //         var page=$(this).attr('href').split('page=')[1];
    //
    //         getData(page);
    //     });
    //
    // });
    //
    // function getData(page){
    //     $.ajax(
    //         {
    //             url: '?page=' + page,
    //             type: "get",
    //             datatype: "html"
    //         }).done(function(data){
    //         $("#tag_container").empty().html(data);
    //         location.hash = page;
    //     }).fail(function(jqXHR, ajaxOptions, thrownError){
    //         alert('No response from server');
    //     });
    // }

    // AjaxPagination Script Ends Here



    // AjaxPagination Script Starts Here
    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('#load a').css('color', '#dfecf6');
            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

            var url = $(this).attr('href');
            getArticles(url);
            window.history.pushState("", "", url);
            window.location.reload();
        });

        function getArticles(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('.articles').html(data);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
    });

    // AjaxPagination Script Ends Here

});