@extends('multiauth::layouts.myapp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @admin('admin') Admin Dashboard @endadmin
                    @admin('teacher') Teacher Dashboard @endadmin
                    @admin('student') Students Dashboard @endadmin
                    @admin('parent') Parents Corner @endadmin
                </div>

                <div class="card-body">
                @include('multiauth::message')
                     You are logged in to @admin('admin') Admin @endadmin
                    @admin('teacher') Teacher @endadmin
                    @admin('student') Students @endadmin
                    @admin('parent') Parents @endadmin side!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
