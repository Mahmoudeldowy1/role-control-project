@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Permission</h3>
                    </div>

                    <form method="post" action="{{route('permissions.store')}}" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstName">Name </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="firstName">Display Name </label>
                                <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{old('display_name')}}" required>
                                @error('display_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="firstName">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" required>{{old('display_name')}}</textarea>
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
