@extends('layouts.app')

@section('title', 'Change Password ')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="col-md-12" style="margin-bottom: 20px;">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title">User change Password</h4>
            </div>
        </div>
        <form action="{{url('change/password')}}" method="post">
            {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>OLD PASSWORD</label>
                        <input type="password" name="old_password" class="form-control" placeholder="enter old password">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="New Password">
                    </div>

                    <div class="form-group">
                        <label>Confirm Pawword</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                        <button type="submit" class="btn btn-primary">Change password</button>
                        </div>

                        <div class="btn-group me-2 ml-3" role="group" aria-label="Second group">
                        <a href="{{url('home')}}" class="btn btn-primary">Back</a>
                        </div>
                        </div>
                   
                </div>
            </form>
</div>

@endsection