@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h2 class="text-success">{{ Session::get('message') }}</h2>
                <form name="editPortfolioForm" action="{{ url('/update-portfolio') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Portfolio Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="portfolio_title" value="{{ $portfolioById->portfolio_title }}" class="form-control"/>
                            <input type="hidden" name="portfolio_id" value="{{ $portfolioById->id }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('portfolio_title') ? $errors->first('portfolio_title') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Portfolio Link</label>
                        <div class="col-sm-9">
                            <input type="text" name="portfolio_link" value="{{ $portfolioById->portfolio_link }}" class="form-control"/>
                            <span style="color: red;">{{ $errors->has('portfolio_link') ? $errors->first('portfolio_link') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Portfolio Terms</label>
                        <div class="col-sm-9">
                            <select name="portfolio_terms" class="form-control">
                                @foreach($terms as $term)
                                    <option value="{{ $term->tag_name }}">{{ $term->tag_name }}</option>
                                @endforeach
                                <span style="color: red;">{{ $errors->has('portfolio_terms') ? $errors->first('portfolio_terms') : ' ' }}</span>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Portfolio Image</label>
                        <div class="col-sm-9">
                            <img src="{{ asset($portfolioById->portfolio_image) }}" width="100" height="90" alt="Portfolio Image" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">New Portfolio Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="portfolio_image" class="form-control" accept="image/*"/>
                            <span style="color: red;">{{ $errors->has('portfolio_image') ? $errors->first('portfolio_image') : ' ' }}</span>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Portfolio Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editPortfolioForm'].elements['portfolio_terms'].value="{{ $portfolioById->portfolio_terms }}";
        document.forms['editPortfolioForm'].elements['publication_status'].value="{{ $portfolioById->publication_status }}";
    </script>
@endsection