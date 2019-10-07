<html>
<title>
<style>
    #posts {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #posts td, #posts th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #posts tr:nth-child(even){background-color: #f2f2f2;}

    #posts tr:hover {background-color: #ddd;}

    #posts th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    @page:right{
        @bottom-left {
            margin: 10pt 0 30pt 0;
            border-top: .25pt solid #666;
            content: "Our Cats";
            font-size: 9pt;
            color: #333;
        }

        @bottom-right {
            margin: 10pt 0 30pt 0;
            border-top: .25pt solid #666;
            content: counter(page);
            font-size: 9pt;
        }

        @top-right {
            content:  string(doctitle);
            margin: 30pt 0 10pt 0;
            font-size: 9pt;
            color: #333;
        }
    }
</style>
</title>

<body>
<div class="row">
    <h1 align="center">Posts</h1>
    <ul>
        <table id="posts" class="table data-table table-bordered table-striped text-center" id="table1">
            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
            </thead>

            <tbody id="posts_list" name="posts-list">
            @foreach($posts as $post)
                <tr data-title="{{$post->title}}" data-body="{{$post->body}}" id="{{$post->id}}">
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </ul>
</div>
</body>
</html>