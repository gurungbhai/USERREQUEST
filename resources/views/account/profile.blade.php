@extends('layouts.app')


@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Profile</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right">
                            <a href="{{ url('edit/profile') }}" class="btn btn-primary" type="button">
                                <i class="ti-user mr-1"></i> Edit Profile
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="col-md-8">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                </div>
            <div class="col-sm-9 text-secondary">
                {{ Auth::user()->name }}
            </div>
        </div>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ Auth::user()->email }}
                </div>
        </div>
    </div>
</div>
                   
                        
                            
                            

@endsection
