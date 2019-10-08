<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
        img{width:100%;height:250px;border:1px solid #e1e1e1;}
        .col-md-4{padding-bottom: 70px;}
        h2{padding-bottom: 20px;}
    </style>
</head>
<body>
<div class="container">


    <h2>LazyLoad Image Example</h2>


    <div class="row">

        <div class="col-md-4">
            <img data-original="http://itsolutionstuff.com/upload/Laravel-5-barcode-generator.png" >
            <a target="_blank" href="http://itsolutionstuff.com/post/laravel-5-authenticate-user-in-nodejs-with-socket-io-using-jwtexample.html">Laravel 5 - Authenticate user in NodeJS with socket io using JWT.</a>
        </div>


        <div class="col-md-4">
            <img data-original="http://itsolutionstuff.com/upload/laravel-angular.png" >
            <a target="_blank" href="http://itsolutionstuff.com/post/laravel-52-and-angularjs-crud-with-search-and-pagination-exampleexample.html">Laravel 5.2 and AngularJS CRUD with Search and Pagination Example.</a>
        </div>


        <div class="col-md-4">
            <img data-original="http://itsolutionstuff.com/upload/Laravel-acl.png" >
            <a target="_blank" href="http://itsolutionstuff.com/post/laravel-52-user-acl-roles-and-permissions-with-middleware-using-entrust-from-scratch-tutorialexample.html">Laravel 5.2 - User ACL Roles and Permissions with Middleware using entrust from Scratch Tutorial</a>
        </div>


        <div class="col-md-4">
            <img data-original="http://itsolutionstuff.com/upload/Laravel-5-resize-image-upload.png" >
            <a target="_blank" href="http://itsolutionstuff.com/post/laravel-5-image-upload-and-resize-example-using-intervention-image-packageexample.html">Laravel 5 - Image Upload and Resize Example using Intervention Image Package</a>
        </div>
    </div>
</div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
    <script type="text/javascript">
        $("img").lazyload({
            effect : "fadeIn"
        });
    </script>
</body>
</html>