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
                           <th>Tag Name</th>
                           <th>Publication Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php $i=1; ?>
                            @foreach($tags as $tag)
                               <tr class="odd gradeX">
                                   <td>{{ $i++ }}</td>
                                   <td>{{ $tag->tag_name }}</td>
                                   <td>{{ $tag->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                   <td>
                                       <a href="{{ url('/view-tag/'.$tag->id) }}" class="btn btn-info btn-xs" title="View Tag">
                                           <span class="glyphicon glyphicon-zoom-in"></span>
                                       </a>
                                       @if($tag->publication_status ==1)
                                           <a href="{{ url('/unpublished-tag/'.$tag->id) }}" class="btn btn-success btn-xs" title="Published Tag">
                                               <span class="glyphicon glyphicon-arrow-up"></span>
                                           </a>
                                       @else
                                           <a href="{{ url('/published-tag/'.$tag->id) }}" class="btn btn-warning btn-xs" title="Unpublished Tag">
                                               <span class="glyphicon glyphicon-arrow-down"></span>
                                           </a>
                                       @endif

                                       <a href="{{ url('/edit-tag/'.$tag->id) }}" class="btn btn-primary btn-xs" title="Edit Tag">
                                           <span class="glyphicon glyphicon-edit"></span>
                                       </a>
                                       <a href="{{ url('/delete-tag/'.$tag->id) }}" class="btn btn-danger btn-xs" title="Delete Tag" onclick="return confirm('Are you sure to delete this'); ">
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