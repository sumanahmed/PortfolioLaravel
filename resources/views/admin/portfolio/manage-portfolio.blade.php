@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Portfolio Title</th>
                            <th>Portfolio Link</th>
                            <th>Portfolio Term</th>
                            <th>Portfolio Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($portfolios as $portfolio)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $portfolio->portfolio_title }}</td>
                                <td>{{ $portfolio->portfolio_link }}</td>
                                <td>{{ $portfolio->portfolio_terms }}</td>
                                <td><img src="{{ asset($portfolio->portfolio_image) }}" alt="" width="60" height="60"></td>
                                <td>{{ $portfolio->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{ url('/view-portfolio/'.$portfolio->id) }}" class="btn btn-info btn-xs" title="View portfolio">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($portfolio->publication_status ==1)
                                        <a href="{{ url('/unpublished-portfolio/'.$portfolio->id) }}" class="btn btn-success btn-xs" title="Published portfolio">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/published-portfolio/'.$portfolio->id) }}" class="btn btn-warning btn-xs" title="Unpublished portfolio">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-portfolio/'.$portfolio->id) }}" class="btn btn-primary btn-xs" title="Edit portfolio">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ url('/delete-portfolio/'.$portfolio->id) }}" class="btn btn-danger btn-xs" title="Delete portfolio" onclick="return confirm('Are you sure to delete this'); ">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@endsection