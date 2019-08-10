@extends('multiauth::layouts.myapp')
@section('content')
<section class="container">


        <div class="card">
                <div class="card-header">
                <h2 class="card-title" style="font-weight:bold;">Select From The Available Classes For Time Table</h2>
                </div>

                <div class="card-body">
                <div id="banner" style="display: block;">
                    <form action="{{route('records.t9')}}" method="post">
                        @csrf
                        <div class="images" style="display: inline-block; max-width: 50%; margin: 0 5%;">
                                <button type="submit" name="nine" value="nine" class="btn btn-app btn-dark"><strong>CLass 9th</strong>
                                </button>
                        </div>
                    </form>

                    </div>
                </div>
                <div class="card-body">
                        <div id="banner" style="display: block;">
                            <form action="{{route('records.t10')}}" method="post">
                                @csrf
                                <div class="images" style="display: inline-block; max-width: 50%; margin: 0 8%;">
                                        <button type="submit" name="10th" value="10th" class="btn btn-app btn-secondary"><strong>CLass 10th</strong></button>
                                </div>
                            </form>
                       </div>
                </div>
        </div>
</section>
@endsection
