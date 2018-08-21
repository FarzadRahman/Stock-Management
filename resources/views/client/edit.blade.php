<form method="post" action="{{route('client.insert')}}">
    {{csrf_field()}}
    <input type="hidden" name="clientId" value="{{$client->clientId}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Client Name</label>
                <input type="text" class="form-control col-md-10" name="clientName" value="{{$client->clientName}}" placeholder="Client Name" required>
            </div>
            <div class="form-group">
                <label>Area</label>
                <select class="form-control col-md-10" name="areaId">
                    <option value="">Select Area</option>
                    @foreach($areas as $area)
                        <option value="{{$area->areaId}}" @if ($client->areaId ==$area->areaId) selected @endif>{{$area->areaName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" >
                <label>Address</label>
                <textarea class="form-control" name="address" required>{{$client->address}}</textarea>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control col-md-10" name="statusId">
                    @foreach($status as $value)
                        <option value="{{$value->statusId}}" @if ($client->statusId ==$value->statusId) selected @endif>{{$value->statusName}}</option>
                    @endforeach
                </select>
            </div>


            <button class="btn btn-success">Update</button>

        </div>
    </div>
</form>