@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Popups List</div>

                <div class="card-body">
                    
                    <a href="{{route('popups.create')}}" class="w-10 btn btn-success mb-3">Add New Popup</a><br>
                    

                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Views</th>
                                <th>Key</th>
                                <th>Show</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($popups as $popup)
                                <tr>
                                    <td>
                                        <a href="{{route('change_status', $popup->id)}}" class="btn {{($popup->status==1 ? 'btn-success' : 'btn-danger')}}">
                                            <i class="material-icons">
                                                {{($popup->status==1 ? 'Active' : 'Inactive')}}
                                            </i>
                                        </a>
                                    </td>
                                    <td>{{$popup->title}}</td>
                                    <td>{{$popup->text}}</td>
                                    <td>{{$popup->view_count}}</td>
                                    <td><a href="{{url('')}}/api/use_popup/{{$popup->key}}" target="_blank">{{$popup->key}}</a></td>
                                    <td>
                                        <a href="{{route('popups.show', $popup->id)}}" class="btn btn-primary">
                                            <i class="material-icons">
                                                Show
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('popups.edit', $popup->id)}}" class="btn btn-success">
                                            <i class="material-icons">
                                                Edit
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('popups.destroy',$popup->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                <i class="material-icons">
                                                    Delete
                                                </i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
