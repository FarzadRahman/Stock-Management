<form method="post" action="{{route('area.update')}}">
    <input type="hidden" name="id" value="{{$area->areaId}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Area Name</label>
                <input type="text" class="form-control col-md-10" value="{{$area->areaName}}" name="areaName" placeholder="Area Name" required>
            </div>

        </div>
        <div class="col-md-12">
            <button class="btn btn-success">Insert</button>

        </div>
    </div>
</form>