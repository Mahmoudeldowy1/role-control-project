@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Role: {{$role->name}}</h3>
                    </div>

                    <form method="post" action="{{route('roles.update',$role->id)}}" >
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstName">Name </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$role->name}}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="firstName">Display Name </label>
                                <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{$role->display_name}}"  required>
                                @error('display_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="firstName">Permissions</label>
                                <select class="form-control" name="permissions[]" multiple>
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}"
                                            @foreach($role->permissions as $role_permission)
                                                @if($role_permission->name == $permission->name)
                                                     selected
                                                 @endif
                                            @endforeach
                                        >{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="firstName">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="15" rows="5" required>{{$role->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <!-- /.content-header -->

    </div>



@endsection
