@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form action="{{ url('/new-tag') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Tag Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="tag_name" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('tag_name') ? $errors->first('tag_name') : ' ' }}</span>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Tag Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection