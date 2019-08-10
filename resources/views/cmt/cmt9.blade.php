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
                                    <th>Teacher Remarks</th>
                                    <th>Updated On</th>
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
                            <td>{{ $rec->comments }}</td>
                            <td>{{$rec->updated_at}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#stdModal" data-action="Show" data-rec="{{$rec}}">
                                        <i class="fa fa-info-circle" data-toggle="tooltip" aria-hidden="true"></i>
                                    </a>
                                    @admin('admin,teacher')
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#stdModal" data-action="Cmt" data-rec="{{$rec}}">
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
                        <h5 class="modal-title">Student Behaviour Updater</h5>
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
                                    <label for="comments">Status </label>
                                    <input type="text" class="form-control" id="comments" name="comments" placeholder="The Student Behaviour For Today">
                                    <span class="text-danger"><strong id="comments-error"></strong></span>
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
            var comments =  document.getElementById("comments")
            

            $('#stdno').html("");
            $('#comments-error').html("");
            

            var modal = $(this)
            modal.find('.modal-title').text(actionType + ' Records')
            submitForm.style.display="block"
            document.getElementById("actionType").value=actionType

            if(actionType == 'Cmt' ||actionType =='Show'){
                var rec = actionButton.data('rec')
                id.value = rec.id
                comments.value = rec.comments
                

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
            $('#comments-error').html("");
           

            $.ajax({
                url:'/records',
                type:'POST',
                data:formData,
                success: function(data){
                    console.log(data);
                    $('#stdModal').modal('hide'); 
                    window.location.href="/cmtt9";
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR.status);
                    data=jqXHR.responseJSON;
                    if(data.errors){
                        if(data.errors.comments){
                            $('#comments-error').html(data.errors.comments[0]);
                        }
                    }
                }

            });
        });
    </script>

@endsection

