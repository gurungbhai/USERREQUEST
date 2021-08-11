@extends('admin.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="containeer" style="width:100%;">
            Hello sir/madam, <br>
            <p>
                Thank you for the opportunity to apply for the internship role at your company, I got to know about your internship program from Facebook. I am certain that I have the necessary skills to successfully do the job adeptly and perform above expectations.
                I am an adaptable college student( Electronic and communication) who recently finished the final year examination from Sagarmatha Engineering College. I really want to explore. While working on academic and extracurricular projects, I
                have developed proven problem-solving, teamwork, and leadership skills, which I hope to leverage into the internship role at your company. After reviewing my CV, I hope you will agree that I am the type of competent and competitive candidate
                you are looking for, I look forward to elaborating on how my specific skills and abilities will benefit your organization. Please contact me at (980)376-9901 or via email at rajanlama79@gmail.com to arrange a convenient meeting time.



                <br>
                <p>
                    You can also visit my website for further details:- <a href="https://grgrajan.wordpress.com/" target="_blank">https://grgrajan.wordpress.com/</a>
                </p>
            </p>

            <br> Thank you for your consideration, and I look forward to hearing from you soon.

        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
