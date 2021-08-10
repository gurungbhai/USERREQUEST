@extends('layouts.app')

@section('title', 'Change Password ')

@section('content')

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
                  
                    <div>
                        <button type="submit" class="form-sub-btn big">Change password</button>
                    </div>
                </div>
            </form>
</div>

@endsection