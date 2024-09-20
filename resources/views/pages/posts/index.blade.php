@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Posts">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
           <i class="fa fa-plus"></i> Create Post
        </a>
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="ibox">
                <div class="ibox-title">
                    <div>
                        <h3>List of Posts</h3>
                    </div>
                    <div class="ibox-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
                            <i class="fa fa-plus"></i> Create Post
                        </button>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>TITLE</th>
                                <th>STORY</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="modal" tabindex="-1" role="dialog" id="create-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="story">Story</label>
                                    <textarea type="text" class="form-control" id="story"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="submit">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog" id="edit-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="hidden" id="edit-id">
                                <div class="form-group">
                                    <label for="edit-title">Title</label>
                                    <input type="text" class="form-control" id="edit-title">
                                </div>
                                <div class="form-group">
                                    <label for="edit-story">Story</label>
                                    <textarea type="text" class="form-control" id="edit-story"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="save-changes">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            load();
        });

        function load () {
            $.get("{{ route('api.posts.index') }}")
                .done(function (r) {
                    for (let i = 0; i < r.length; i++) {
                        const row = r[i];
                        
                        $('#tbody').append(
                            `<tr>` +
                                `<td>${row.title}</td>` +
                                `<td>${row.story}</td>` +
                                `<td>` +
                                    `<button class="btn btn-primary" onclick="editPost('${row.ulid}','${row.title}','${row.story}')"><i class="fa fa-pencil"></i></button>` +
                                    `&nbsp;&nbsp;` +
                                    `<button class="btn btn-danger" onclick="deletePost('${row.ulid}')"><i class="fa fa-trash"></i></button>` +
                                `</td>` +
                            `</tr>`
                        );
                    }
                }).fail(function (r) {
                    console.log(r);
                });
        }

        $('#submit').click(function () {

            $title = $('#title');
            $story = $('#story');

            if ($title.val().length == 0) {
                alert('Title field is required');
            }

            if ($story.val().length == 0) {
                alert('Story field is required');
            }

            if ($title.val().length != 0 && $story.val().length != 0) {
                $.post("{{ route('api.posts.store') }}", {
                    'title': $('#title').val(),
                    'story': $('#story').val(),
                }).done(function (r) {
                    alert(r.message);

                    $('#tbody').empty();
                    load();

                    $title.val('');
                    $story.val('');
                }).fail(function (r) {
                    console.log(r.responseJSON.errors.title);
                });
            }
        });

        function deletePost (id) {
            $.ajax({
                url: "{{ url('/api/posts/') }}/" + id,
                method: 'DELETE',
                success: function (r) {
                    alert(r.message);

                    $('#tbody').empty();
                    load();
                },
            });
        }

        function editPost (id, title, story) {

            $('#edit-modal').modal('toggle');
            $('#edit-modal').modal('show');

            $('#edit-id').val(id);
            $('#edit-title').val(title);
            $('#edit-story').val(story);
        }

        $('#save-changes').click(function () {

            $title = $('#edit-title');
            $story = $('#edit-story');
            $id = $('#edit-id');

            if ($title.val().length == 0) {
                alert('Title field is required');
            }

            if ($story.val().length == 0) {
                alert('Story field is required');
            }

            if ($title.val().length != 0 && $story.val().length != 0) {
                $.ajax({
                    url: "{{ url('/api/posts/') }}/" + $id.val(),
                    method: 'PATCH',
                    data: {
                        'title': $title.val(),
                        'story': $story.val(),
                    },
                    success: function (r) {
                        alert(r.message);

                        $('#edit-modal').modal('hide');
                        $('#tbody').empty();
                        load();
                    },
                });
            }
        });
    </script>
@endsection