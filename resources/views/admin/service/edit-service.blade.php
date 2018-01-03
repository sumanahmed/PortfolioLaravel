@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form name="editServiceForm" action="{{ url('/update-skill') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Service Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="service_title" value="{{ $serviceById->service_title }}" class="form-control"/>
                            <input type="hidden" name="service_id" value="{{ $serviceById->id }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('service_title') ? $errors->first('service_title') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Service Text</label>
                        <div class="col-sm-9">
                            <input type="text" name="service_text" value="{{ $serviceById->service_text }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('service_text') ? $errors->first('service_text') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Service Link</label>
                        <div class="col-sm-9">
                            <input type="text" name="service_link" value="{{ $serviceById->service_link }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('service_link') ? $errors->first('service_link') : ' ' }}</span>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Service Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editServiceForm'].elements['publication_status'].value='{{ $serviceById->publication_status }}';
    </script>
@endsection