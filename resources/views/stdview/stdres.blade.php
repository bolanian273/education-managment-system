@extends('multiauth::layouts.myapp')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title" style="font-weight:bold; font-size:20px">To View Your Result</h2>
        </div>
            <div class="card-body">
                <h6 style="padding-left:20px; font-weight:bolder;">Enter Your Secret Key</h6>
                <br>
                <div class="col-md-4">
                    <form action="/stdres" method="post">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="password" name="stdres" placeholder="your key here" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
        </div>

        </div>
</section>
@endsection
