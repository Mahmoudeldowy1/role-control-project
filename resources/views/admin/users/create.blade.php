@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New User</h3>
                    </div>

                    <form method="post" action="{{route('users.store')}}" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstName">Complete Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="phone">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Confirm Password</label>
                                <input type="password" class="form-control " name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="firstName">Roles</label>
                                <select class="form-control" name="roles[]" multiple>
                                  @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
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
