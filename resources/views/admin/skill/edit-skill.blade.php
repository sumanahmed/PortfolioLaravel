@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form name="editSkillForm" action="{{ url('/update-skill') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Skill Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="skill_name" value="{{ $skillById->skill_name }}" class="form-control"/>
                            <input type="hidden" name="skill_id" value="{{ $skillById->id }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('skill_name') ? $errors->first('skill_name') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Skill Percent</label>
                        <div class="col-sm-9">
                            <input type="text" name="skill_percent" value="{{ $skillById->skill_percent }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('skill_percent') ? $errors->first('skill_percent') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Skill Color</label>
                        <div class="col-sm-9">
                            <input type="color" name="skill_color" value="{{ $skillById->skill_color }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('skill_color') ? $errors->first('skill_color') : ' ' }}</span>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Skill Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editSkillForm'].elements['publication_status'].value="{{ $skillById->publication_status  }}";
    </script>
@endsection