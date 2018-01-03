@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form action="{{ url('/new-blog') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="blog_title" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('blog_title') ? $errors->first('blog_title') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Blog Description</label>
                        <div class="col-sm-9">
                            <textarea name="blog_description" id="" cols="30" rows="10" class="form-control" ></textarea>
                            <span style="color: red;">{{ $errors->has('blog_description') ? $errors->first('blog_description') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Blog Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="blog_image" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('blog_image') ? $errors->first('blog_image') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" class="form-control">
                                <option>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                                <span style="color: red;">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Blog Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection