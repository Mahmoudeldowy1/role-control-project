@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        @if(session('role-deleted-message'))
                            <div class="alert alert-danger">{{session('role-deleted-message')}}</div>
                        @elseif(session('role-created-message'))
                            <div class="alert alert-success">{{session('role-created-message')}}</div>
                        @elseif(session('role-updated-message'))
                            <div class="alert alert-success">{{session('role-updated-message')}}</div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Roles</h3>
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

                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->display_name}}</td>
                                            <td>{{$role->description}}</td>
                                            <td>{{$role->created_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('roles.edit', $role->id)}}"><button class="btn btn-block btn-secondary">Edit</button></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('roles.destroy', $role->id)}}" method="post" enctype="multipart/form-data">
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



