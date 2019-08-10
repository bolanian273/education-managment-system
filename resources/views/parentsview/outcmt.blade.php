@extends('multiauth::layouts.myapp')


@section('content')


<section class="content">
<div class="card-body">
        <table class="table table-striped table-bordered table-hover">
                <thead>
                        <tr>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Class</th>
                            <th>Teacher Remarks</th>
                            <th>Updated On</th>
                        </tr>
                </thead>
            <tbody>
             @if($data->count())
                @foreach($data as $rec)
                <tr>
                    <td>{{ $rec->name }}</td>
                    <td>{{ $rec->father_name }}</td>
                    <td>{{ $rec->sec }}</td>
                    <td style="color:black; text-align:center;font-weight:bold; font-size:18px">{{ $rec->comments }}</td>
                    <td>{{$rec->updated_at}}</td>
                </tr>
                @endforeach
                @else
                {{-- if there are no departments then show this message --}}
                <tr>
                        <td colspan="6"><h6 class="grey-text text-darken-2 center" style="text-align:center;font-size:25px">No Records found!</h6></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
</section>
@endsection