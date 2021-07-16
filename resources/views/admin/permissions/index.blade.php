@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        @if(session('permission-deleted-message'))
                            <div class="alert alert-danger">{{session('permission-deleted-message')}}</div>
                        @elseif(session('permission-created-message'))
                            <div class="alert alert-success">{{session('permission-created-message')}}</div>
                        @elseif(session('permission-updated-message'))
                            <div class="alert alert-success">{{session('permission-updated-message')}}</div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Permissions</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Delete Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->display_name}}</td>
                                            <td>{{$permission->description}}</td>
                                            <td>{{$permission->created_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('permissions.edit', $permission->id)}}"><button class="btn btn-block btn-secondary">Edit</button></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('permissions.destroy', $permission->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-block btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Delete Option</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.content-header -->

    </div>



@endsection



