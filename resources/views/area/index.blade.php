@extends('main')
@section('content')

    <!-- The Modal -->
    <div class="modal" id="clientAreaModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Area</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="clientAreaModalBody">

                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card container">
        <div class="card-header">
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i>
            </button>


        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Area</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="{{route('area.insert')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Area Name</label>
                                        <input type="text" class="form-control col-md-10" name="areaName" placeholder="Area Name" required>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success">Insert</button>

                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Area</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($areas as $area)
                        <tr>
                            <td>{{$area->areaName}}</td>
                            <td><button class="btn btn-success btn-sm" data-panel-id="{{$area->areaId}}" onclick="edit(this)">Edit</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>




@endsection
@section('foot-js')
<script>
    function edit(x) {
        var id=$(x).data('panel-id');
        $.ajax({
            type: 'POST',
            url: "{!! route('area.edit') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'id': id},
            success: function (data) {
                $('#clientAreaModalBody').html(data);
                $('#clientAreaModal').modal();
                // console.log(data);
            }
        });

    }
</script>


@endsection