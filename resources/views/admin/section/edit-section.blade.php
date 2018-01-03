@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form action="{{ url('/update-section') }}" method="POST" class="form-horizontal" >
                    {{ csrf_field() }}
                    @foreach($sections as $section)
                        <div class="form-group">
                            <label class="col-sm-3">About Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="about_title" value="{{ $section->about_title }}" class="form-control"/>
                                <input type="hidden" name="section_id" value="{{ $section->id }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('about_title') ? $errors->first('about_title') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">About Description</label>
                            <div class="col-sm-9">
                                <textarea name="about_description" id="" cols="30" rows="5" class="form-control">{{ $section->about_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('about_description') ? $errors->first('about_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Skill Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="skill_title" value="{{ $section->skill_title }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('skill_title') ? $errors->first('skill_title') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Skill Description</label>
                            <div class="col-sm-9">
                                <textarea name="skill_description" id="" cols="30" rows="5" class="form-control">{{ $section->skill_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('skill_description') ? $errors->first('skill_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Portfolio Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="portfolio_title" value="{{ $section->portfolio_title }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('portfolio_title') ? $errors->first('portfolio_title') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Portfolio Description</label>
                            <div class="col-sm-9">
                                <textarea name="portfolio_description" id="" cols="30" rows="5" class="form-control">{{ $section->portfolio_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('portfolio_description') ? $errors->first('portfolio_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Service Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="service_title" value="{{ $section->service_title }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('service_title') ? $errors->first('service_title') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Service Description</label>
                            <div class="col-sm-9">
                                <textarea name="service_description" id="" cols="30" rows="5" class="form-control">{{ $section->service_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('service_description') ? $errors->first('service_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" value="{{ $section->blog_title }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('blog_title') ? $errors->first('blog_title') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Blog Description</label>
                            <div class="col-sm-9">
                                <textarea name="blog_description" id="" cols="30" rows="5" class="form-control">{{ $section->blog_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('blog_description') ? $errors->first('blog_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Contact Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact_title" value="{{ $section->contact_title }}" class="form-control"/>
                                <span style="color: red;">{{ $errors->has('contact_title') ? $errors->first('contact_title') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">Contact Description</label>
                            <div class="col-sm-9">
                                <textarea name="contact_description" id="" cols="30" rows="5" class="form-control">{{ $section->contact_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('contact_description') ? $errors->first('contact_description') : ' ' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Section Info"/>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection