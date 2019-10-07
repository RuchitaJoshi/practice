@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <div><h2>Posts</h2></div>
                    <div class="form-group">
                        <input type="text" id="search" name="search" class="form-control" />
                    </div>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                        Create New Post
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Post</h4>
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" id="frmPost" name="frmPost">
                        <div class="form-group">
                            <label class="control-label" for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" data-error="Please enter title." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description:</label>
                            <textarea id="body" name="body" class="form-control" data-error="Please enter description." required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="add-post" class="btn btn-success" value="add">Submit</button>
                            <input type="hidden" id="post-id" name="post-id" value="0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div id="table-data">
            @include("posts.ajax");
        </div>

        <div class="form-group">
            {!! Form::open(['method' => 'POST','id' => 'myForm', 'action'=>null, 'file' => true]) !!}
                <input type="text" id="myInput" name="myInput" class="form-control" />
                <button type="submit" id="ajax-submit" class="ajax-submit btn btn-success" name="ajax-submit">Ajax Submit</button>
            {!! Form::close() !!}
        </div>
</div>

@endsection

