@extends('multiauth::layouts.myapp')


@section('content')


<section class="content">
<div class="card-body">
        <table class="table table-striped table-bordered table-hover">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Date Of Birth</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                </thead>
            <tbody>
             @if($data->count())
                @foreach($data as $rec)
                <tr>
                    <td>{{ $rec->id }}</td>
                    <td>{{ $rec->name }}</td>
                    <td>{{ $rec->father_name }}</td>
                    <td>{{ $rec->dob }}</td>
                    <td>{{ $rec->sec }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#stdModal" data-action="Show" data-rec="{{$rec}}">
                                <i class="fa fa-info-circle" data-toggle="tooltip" aria-hidden="true"></i>
                            </a>
                            @admin('admin,teacher')
                            <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#stdModal" data-action="Edit" data-rec="{{$rec}}">
                                <i class="fa fa-edit" data-toggle="tooltip"></i>
                            </a>
                            @endadmin
                            @admin('admin')
                            <form class="form-inline" method="post" action="{{route('records.destroy',$rec) }}"
                            onsubmit="return confirm('Are You Sure to Delete the Records?')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endadmin
                        </div>
                    </td>
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
    <!--New Employee Modal Window -->
    <div class="modal fade" id="stdModal" tableindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">BIO Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="studentForm" role="form">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="actionType" name="actionType">
                            <div class="form-group">
                                <label for="id">Student Id </label>
                                <input type="hidden" class="form-control" id="id" name="id">
                                <span class="text-danger"><strong id="stdno"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                <span class="text-danger"><strong id="name-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Father Name </label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Full Father Name">
                                <span class="text-danger"><strong id="father_name-error"></strong></span>
                            </div>
                            <div class="form-group">
                                    <label for="cnic">Father's CNIC </label>
                                    <input type="text" class="form-control" id="cnic" name="cnic" placeholder="xxxxxxxxxxxxx">
                                    <span class="text-danger"><strong id="cnic-error"></strong></span>
                                </div>
                            <div class="form-group">
                                    <label for="phone_number">Phone Number </label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="xxxxxxxxxxx">
                                    <span class="text-danger"><strong id="phone_number-error"></strong></span>
                                </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth </label>
                                <input type="date" class="form-control" id="dob" name="dob">
                                <span class="text-danger"><strong id="dob-error"></strong></span>
                            </div>
                            <div class="form-group">
                                    <label for="gender">Gender </label>
                                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Male/Female">
                                    <span class="text-danger"><strong id="gender-error"></strong></span>
                                </div>
                            <div class="form-group">
                                        <label for="religion">Religion </label>
                                        <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion">
                                        <span class="text-danger"><strong id="religion-error"></strong></span>
                            </div>
                            <div class="form-group">
                                    <label for="blood_group">Blood Group </label>
                                    <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder="Blood Group">
                                    <span class="text-danger"><strong id="blood_group-error"></strong></span>
                             </div>
                             <div class="form-group">
                                    <label for="sec">Class </label>
                                    <input type="text" class="form-control" id="sec" name="sec" placeholder="Class">
                                    <span class="text-danger"><strong id="sec-error"></strong></span>
                                </div>
                            <div class="form-group">
                                <label for="doa">Admission Date </label>
                                <input type="date" class="form-control" id="doa" name="doa">
                                <span class="text-danger"><strong id="doa-error"></strong></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="submitForm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
@section('script')
    <script>
        $('#stdModal').on('show.bs.modal',function(e){
            var actionButton = $(e.relatedTarget)
            var actionType = actionButton.data('action')
            var id = document.getElementById("id")
            var name =  document.getElementById("name")
            var father_name=  document.getElementById("father_name")
            var cnic=  document.getElementById("cnic")
            var phone_number=  document.getElementById("phone_number")
            var department=  document.getElementById("dob")
            var gender=  document.getElementById("gender")
            var religion=  document.getElementById("religion")
            var blood_group=  document.getElementById("blood_group")
            var sec=  document.getElementById("sec")
            var doa=  document.getElementById("doa")


            if(actionType =='Show'){
                var rec = actionButton.data('rec')
                id.value = rec.id
                name.value = rec.name
                father_name.value = rec.father_name
                cnic.value = rec.cnic
                phone_number.value = rec.phone_number
                dob.value = rec.dob
                gender.value = rec.gender
                religion.value = rec.religion
                blood_group.value = rec.blood_group
                sec.value = rec.sec
                doa.value = rec.doa

                $('#stdno').html(rec.id)
            }
            if(actionType =='Show'){
                submitForm.style.display="none"
            }
        })

        $('body').on('click','#submitForm', function(){
            var formData = studentForm.serialize();

            $.ajax({
                url:'/records',
                type:'POST',
                data:formData,
                success: function(data){
                    console.log(data);
                    $('#stdModal').modal('hide');
                    window.location.href="/records";
                },


            });
        });
    </script>

@endsection
