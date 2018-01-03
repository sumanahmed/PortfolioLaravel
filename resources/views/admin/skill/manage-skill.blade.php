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
                            <th>skill Name</th>
                            <th>skill Percent</th>
                            <th>skill Color</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($skills as $skill)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $skill->skill_name }}</td>
                                <td>{{ $skill->skill_percent }}</td>
                                <td><p style="background-color: {{ $skill->skill_color }}">COLOR</p></td>
                                <td>{{ $skill->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{ url('/view-skill/'.$skill->id) }}" class="btn btn-info btn-xs" title="View skill">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($skill->publication_status ==1)
                                        <a href="{{ url('/unpublished-skill/'.$skill->id) }}" class="btn btn-success btn-xs" title="Published skill">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/published-skill/'.$skill->id) }}" class="btn btn-warning btn-xs" title="Unpublished skill">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-skill/'.$skill->id) }}" class="btn btn-primary btn-xs" title="Edit skill">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ url('/delete-skill/'.$skill->id) }}" class="btn btn-danger btn-xs" title="Delete skill" onclick="return confirm('Are you sure to delete this'); ">
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