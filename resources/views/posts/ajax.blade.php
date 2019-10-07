<div class="row">
    <ul>
        <a href="{{ url('/generate-pdf') }}" class="btn btn-success mb-2">Export PDF</a>
        <table class="table data-table" id="table1">
            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                {{--<th>Action</th>--}}
            </tr>
            </thead>

            <tbody id="posts_list" name="posts-list">
            @foreach($posts as $post)
                <tr data-title="{{$post->title}}" data-body="{{$post->body}}" id="{{$post->id}}">
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>
                        <button class='btn btn-info btn-xs btn-edit'>Edit</button>
                        <button class='btn btn-danger btn-xs btn-delete'>Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <div class="text-center">
            {!! $posts->render() !!}
        </div>
    </ul>
</div>