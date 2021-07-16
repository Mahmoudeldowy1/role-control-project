@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        @if(session('user-deleted-message'))
                            <div class="alert alert-danger">{{session('user-deleted-message')}}</div>
                        @elseif(session('user-created-message'))
                            <div class="alert alert-success">{{session('user-created-message')}}</div>
                        @elseif(session('user-updated-message'))
                            <div class="alert alert-success">{{session('user-updated-message')}}</div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    {{$role->name }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('users.edit', $user->id)}}"><button class="btn btn-block btn-secondary">Edit</button></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('users.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
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
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Created At</th>
                                        <th>Options</th>
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
