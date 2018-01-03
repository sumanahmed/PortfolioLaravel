@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form action="{{ url('/update-contact') }}" method="POST" class="form-horizontal" >
                    {{ csrf_field() }}
                    @foreach($contacts as $contact)
                        <div class="form-group">
                            <label class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" value="{{ $contact->email }}" class="form-control"/>
                                <input type="hidden" name="contact_id" value="{{ $contact->id }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" name="mobile" value="{{ $contact->mobile }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('mobile') ? $errors->first('mobile') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Facebook Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="fb" value="{{ $contact->fb }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('fb') ? $errors->first('fb') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Twitter Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="tw" value="{{ $contact->tw }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('tw') ? $errors->first('tw') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Linked In Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="ln" value="{{ $contact->ln }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('ln') ? $errors->first('ln') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Google Plus Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="gp" value="{{ $contact->gp }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('gp') ? $errors->first('gp') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Google Map Link</label>
                            <div class="col-sm-9">
                                <textarea name="google_map" id="" cols="30" rows="5" class="form-control">{{ $contact->google_map }}</textarea>
                                <span style="color: red;">{{ $errors->has('google_map') ? $errors->first('google_map') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Reserved By</label>
                            <div class="col-sm-9">
                                <input type="text" name="reserved_by" value="{{ $contact->reserved_by }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('reserved_by') ? $errors->first('reserved_by') : ' ' }}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Contact Info"/>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection