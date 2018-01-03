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
                            <th>Service Title</th>
                            <th>Service Text</th>
                            <th>Service Link</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($services as $service)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $service->service_title }}</td>
                                <td>{{ $service->service_text }}</td>
                                <td>{{ $service->service_link }}</td>
                                <td>{{ $service->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{ url('/view-service/'.$service->id) }}" class="btn btn-info btn-xs" title="View Service">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($service->publication_status ==1)
                                        <a href="{{ url('/unpublished-service/'.$service->id) }}" class="btn btn-success btn-xs" title="Published Service">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/published-service/'.$service->id) }}" class="btn btn-warning btn-xs" title="Unpublished Service">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-service/'.$service->id) }}" class="btn btn-primary btn-xs" title="Edit Service">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ url('/delete-service/'.$service->id) }}" class="btn btn-danger btn-xs" title="Delete Service" onclick="return confirm('Are you sure to delete this'); ">
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