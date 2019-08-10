@extends('multiauth::layouts.myapp')


@section('content')


<section class="content">
<div class="card-body">
        <table class="table table-striped table-bordered table-hover">
                <thead>
                        <tr>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Name</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Class</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">English</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Urdu</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Mathematics</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Computer/Biology</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Islamiyat</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Pakistan Studies</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size: 19px">Physics</th>
                            <th style="color:black; text-align:center;font-weight:bold; font-size:19px">Chemistry</th>
                        </tr>
                </thead>
            <tbody>
             @if($data->count())
                @foreach($data as $rec)
                <tr>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->name }}</td>
                    @if ($rec->sec == '9th')
                    <td style="color:black; text-align:center; background-color:royalblue;  font-size:18px">{{ $rec->sec }}</td>
                    @else
                    <td style="color:black; text-align:center; background-color:darkcyan;  font-size:18px">{{ $rec->sec }}</td>
                    @endif
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->eng }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->urdu }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->maths }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->cptr }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->isl }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->pakstd }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->phy }}</td>
                    <td style="color:black; text-align:center;  font-size:18px">{{ $rec->chem }}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
</section>
@endsection