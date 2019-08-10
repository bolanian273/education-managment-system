@extends('multiauth::layouts.myapp')

@section('content')
<section class="content">
        @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Students</h2>
            <div class="col-md-4">
                <form action="/search" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search By Name" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                    <tbody>
                     @if($records->count())
                        @foreach($records as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>{{ $rec->name }}</td> 
                            <td>{{ $rec->sec }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#stdModal" data-action="Show" data-rec="{{$rec}}">
                                        <i class="fa fa-info-circle" data-toggle="tooltip" aria-hidden="true"></i>
                                    </a>
                                    @admin('admin,teacher')
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#stdModal" data-action="Res" data-rec="{{$rec}}">
                                        <i class="fa fa-edit" data-toggle="tooltip"></i>
                                    </a>
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
                    @if(isset($search))
                                <tr>
                                    <td colspan="8">
                                        <a href="/records" class="right">Show All Record</a>
                                    </td>
                                </tr>
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-tools">
            <div class="card-body">
        {{$records->links()}}
        </div>
        </div>

        <!--New Employee Modal Window -->
        <div class="modal fade" id="stdModal" tableindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Student Educational Records</h5>
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
                                <label for="eng">English </label>
                                <input type="number" class="form-control" id="eng" name="eng" placeholder="English Marks">
                                <span class="text-danger"><strong id="eng-error"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="urdu">Urdu</label>
                                <input type="number" class="form-control" id="urdu" name="urdu" placeholder="Urdu Marks">
                                <span class="text-danger"><strong id="urdu-error"></strong></span>
                            </div>
                            <div class="form-group">
                                    <label for="maths">Mathematics </label>
                                    <input type="number" class="form-control" id="maths" name="maths" placeholder="Maths Marks">
                                    <span class="text-danger"><strong id="maths-error"></strong></span>
                                </div>
                            <div class="form-group">
                                    <label for="cptr">Computer/Biology </label>
                                    <input type="number" class="form-control" id="cptr" name="cptr" placeholder="Computer/Bio Marks">
                                    <span class="text-danger"><strong id="cptr-error"></strong></span>
                                </div>
                            <div class="form-group">
                                <label for="isl">Islamiyat </label>
                                <input type="number" class="form-control" id="isl" name="isl">
                                <span class="text-danger"><strong id="isl-error"></strong></span>
                            </div>
                            <div class="form-group">
                                    <label for="pakstd">Pakistan Studies </label>
                                    <input type="number" class="form-control" id="pakstd" name="pakstd" placeholder="Pakistan Studies Marks">
                                    <span class="text-danger"><strong id="pakstd-error"></strong></span>
                                </div>
                            <div class="form-group">
                                        <label for="phy">Physics </label>
                                        <input type="number" class="form-control" id="phy" name="phy" placeholder="Physics Marks">
                                        <span class="text-danger"><strong id="phy-error"></strong></span>
                            </div>
                            <div class="form-group">
                                    <label for="chem">Chemistry </label>
                                    <input type="number" class="form-control" id="chem" name="chem" placeholder="Chemistry Marks">
                                    <span class="text-danger"><strong id="chem-error"></strong></span>
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
            var eng =  document.getElementById("eng")
            var urdu=  document.getElementById("urdu")
            var maths=  document.getElementById("maths")
            var cptr=  document.getElementById("cptr")
            var isl=  document.getElementById("isl")
            var pakstd=  document.getElementById("pakstd")
            var phy=  document.getElementById("phy")
            var chem=  document.getElementById("chem")

            $('#stdno').html("");
            $('#eng-error').html("");
            $('#urdu-error').html("");
            $('#maths-error').html("");
            $('#cptr-error').html("");
            $('#isl-error').html("");
            $('#pakstd-error').html("");
            $('#phy-error').html("");
            $('#chem-error').html("");

            var modal = $(this)
            modal.find('.modal-title').text(actionType + ' Records')
            submitForm.style.display="block"
            document.getElementById("actionType").value=actionType

            if(actionType == 'Res' ||actionType =='Show'){
                var rec = actionButton.data('rec')
                id.value = rec.id
                eng.value = rec.eng
                urdu.value = rec.urdu
                maths.value = rec.maths
                cptr.value = rec.cptr
                isl.value = rec.isl
                pakstd.value = rec.pakstd
                phy.value = rec.phy
                chem.value = rec.chem

                $('#stdno').html(rec.id)
            }
            else{
                id.value = null;
                document.getElementById('studentForm').reset()
            }
            if(actionType =='Show'){
                submitForm.style.display="none"
            }

        })

        $('body').on('click','#submitForm', function(e){
            e.preventDefault();
            var studentForm = $("#studentForm");
            var formData = studentForm.serialize();
            $('#eng-error').html("");
            $('#urdu-error').html("");
            $('#maths-error').html("");
            $('#cptr-error').html("");
            $('#isl-error').html("");
            $('#pakstd-error').html("");
            $('#phy-error').html("");
            $('#chem-error').html("");

            $.ajax({
                url:'/records',
                type:'POST',
                data:formData,
                success: function(data){
                    console.log(data);
                    $('#stdModal').modal('hide'); 
                    window.location.href="/t9rr";
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR.status);
                    data=jqXHR.responseJSON;
                    if(data.errors){
                        if(data.errors.eng){
                            $('#eng-error').html(data.errors.eng[0]);
                        }
                        if(data.errors.urdu){
                            $('#urdu-error').html(data.errors.urdu[0]);
                        }
                        if(data.errors.maths){
                            $('#maths-error').html(data.errors.maths[0]);
                        }
                        if(data.errors.cptr){
                            $('#cptr-error').html(data.errors.cptr[0]);
                        }
                        if(data.errors.isl){
                            $('#isl-error').html(data.errors.isl[0]);
                        }
                        if(data.errors.pakstd){
                            $('#pakstd-error').html(data.errors.pakstd[0]);
                        }
                        if(data.errors.phy){
                            $('#phy-error').html(data.errors.phy[0]);
                        }
                        if(data.errors.chem){
                            $('#chem-error').html(data.errors.chem[0]);
                        }
                    }
                }

            });
        });
    </script>

@endsection

