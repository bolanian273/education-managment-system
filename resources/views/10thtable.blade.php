@extends('multiauth::layouts.myapp')
@section('content')
<section class="container">


        <div class="card">
                <div class="card-header">
                <h1 class="card-title"><FONT COLOR="DARKCYAN">10th Class Time Table</FONT></h1>
                </div>

                <div class="card-body">

                        <table border="1" cellspacing="100" align="center">
                                <tr>
                                 <td align="center">
                                 <td>1st Period
                                 <td>2nd Period
                                 <td>3rd Period
                                 <td>4th Period
                                 <td> ********
                                 <td>5th Period
                                 <td>6th Period
                                 <td>7th Period
                                 <td>8th Period
                                </tr>
                                @foreach ($data as $tb)

                                @if($tb->id == 1)
                                <tr>
                                 <td align="center">MONDAY
                                 <td align="center">{{$tb->one}}<td align="center"><font color="green">{{$tb->two}}<br>
                                 <td align="center">{{$tb->three}}<br>
                                 <td align="center">{{$tb->four}}<br>
                                 <td rowspan="6"align="center">L<br>U<br>N<br>C<br>H
                                 <td align="center"><font color="red">{{$tb->five}}<br>
                                 <td align="center"><font color="brown">{{$tb->six}}<br>
                                 <td align="center">{{$tb->seven}}<td align="center">{{$tb->eight}}
                                </tr>
                                @endif
                                @if($tb->id == 2)
                                <tr>
                                 <td align="center">TUESDAY
                                 <td align="center"><font color="blue">{{$tb->one}}<br>
                                 <td align="center"><font color="red">{{$tb->two}}<br>
                                 <td align="center"><font color="purple">{{$tb->three}}<br>
                                 <td align="center">{{$tb->four}}
                                 <td align="center"><font color="orange">{{$tb->five}}<BR>
                                 <td align="center"><font color="maroon">{{$tb->six}}<br>
                                 <td align="center">{{$tb->seven}}<td align="center">{{$tb->eight}}
                                </tr>
                                @endif
                                @if($tb->id == 3)
                                <tr>
                                 <td align="center">WEDNESDAY
                                 <td align="center"><font color="purple">{{$tb->one}}<br>
                                 <td align="center"><font color="orange">{{$tb->two}}<BR>
                                 <td align="center"><font color="brown">{{$tb->three}}<br>
                                 <td align="center">{{$tb->four}}<td align="center">{{$tb->five}}
                                 <td align="center">{{$tb->six}}<td align="center">{{$tb->seven}}
                                 <td align="center">{{$tb->eight}}       
                                </tr>
                                @endif
                                @if($tb->id == 4)
                                <tr>
                                 <td align="center">THURSDAY
                                 <td align="center"><font color="purple">{{$tb->one}}<br>
                                 <td align="center"><font color="orange">{{$tb->two}}<BR>
                                 <td align="center"><font color="brown">{{$tb->three}}<br>
                                 <td align="center">{{$tb->four}}<td align="center">{{$tb->five}}
                                 <td align="center">{{$tb->six}}<td align="center">{{$tb->seven}}
                                 <td align="center">{{$tb->eight}}      
                                </tr>
                                @endif
                                @if($tb->id == 5)
                                <tr>
                                 <td align="center">FRIDAY
                                 <td align="center"><font color="purple">{{$tb->one}}<br>
                                 <td align="center"><font color="orange">{{$tb->two}}<BR>
                                 <td align="center"><font color="brown">{{$tb->three}}<br>
                                 <td align="center">{{$tb->four}}<td align="center">{{$tb->five}}
                                 <td align="center">{{$tb->six}}<td align="center">{{$tb->seven}}
                                 <td align="center">{{$tb->eight}}  
                                </tr>
                                @endif
                                @endforeach
                        </table>
                </div>
        </div>
</section>

@endsection

