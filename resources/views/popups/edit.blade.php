@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Popup</div>
                <div class="card-body">
                    <form action="{{route('popups.update', $popup->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-floating mb-3">
                            <input type="text" name="title" value="{{$popup->title}}" class="form-control" id="title" placeholder="Popup Title" autocomplete="off">
                            <label for="title">Popup Title<span style="color:red"> *</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="text" value="{{$popup->text}}" class="form-control" id="text" placeholder="Text" autocomplete="off">
                            <label for="text">Popup Text<span style="color:red"> *</span></label>
                        </div>
                        <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="status" value="1" id="status1" autocomplete="off" {{($popup->status==1 ? 'checked' : '')}} >
                            <label class="btn btn-outline-success" for="status1">Active</label>
                          
                            <input type="radio" class="btn-check" name="status" value="0" id="status2" autocomplete="off" {{($popup->status==0 ? 'checked' : '')}} >
                            <label class="btn btn-outline-danger" for="status2">Inactive</label>
                          </div>
                        <input type="submit" value="Update" class="w-100 btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection