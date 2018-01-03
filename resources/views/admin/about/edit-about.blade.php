@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form action="{{ url('/update-about') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($abouts as $about)
                    <div class="form-group">
                        <label class="col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{ $about->name }}" class="form-control"/>
                            <input type="hidden" name="about_id" value="{{ $about->id }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" value="{{ $about->email }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Present Address</label>
                        <div class="col-sm-9">
                            <textarea name="present_address" id="" cols="30" rows="4" class="form-control">{{ $about->present_address }}</textarea>
                            <span style="color: red;">{{ $errors->has('present_address') ? $errors->first('present_address') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Permanent Address</label>
                        <div class="col-sm-9">
                            <textarea name="permanent_address" id="" cols="30" rows="4" class="form-control">{{ $about->permanent_address }}</textarea>
                            <span style="color: red;">{{ $errors->has('permanent_address') ? $errors->first('permanent_address') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone" value="{{ $about->phone }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Nationality</label>
                        <div class="col-sm-9">
                            <input type="text" name="nationality" value="{{ $about->nationality }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('nationality') ? $errors->first('nationality') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">About Image </label>
                        <div class="col-sm-9">
                            <img src="{{ asset($about->about_image) }}" width="100" height="80" alt="About Image" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">New About Image </label>
                        <div class="col-sm-9">
                            <input type="file" name="about_image" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('about_image') ? $errors->first('about_image') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update About Info"/>
                        </div>
                    </div>
                  @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection