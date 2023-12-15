@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card text-center">
                <div class="card-header">Email Verification Success</div>
                <div class="card-body">
                    <p class="text-center">Your email has been successfully verified.</p>
                    <a href="{{ route('companies.index') }}" class="btn btn-primary">Continue to Companies</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection