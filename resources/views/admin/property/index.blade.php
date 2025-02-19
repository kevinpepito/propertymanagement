@extends('layouts.master')
@section('title', 'Property')
@section ('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Property <a href=" {{  url('admin/add-properties') }} " class="btn btn-primary btn-sm float-end">Add Property</a></h4>
        </div>
        <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success"> {{ session('message') }} </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($property as $item)
                <tr>
                    <td> {{ $item->id}} </td>
                    <td> {{ $item->name}} </td>
                    <td> {{ $item->description}} </td>
                    <td> {{ $item->price}} </td>
                    <td>
                        <img src="{{ asset('uploads/property/'.$item->image) }}" width="100px" height="100px" alt="Img">
                    </td>
                    <td> {{ $item->status == '1' ? 'Hidden': 'Shown'}} </td>
                    <td> 
                        <a href="{{ url('admin/edit-property/'.$item->id) }}" class="btn btn-success">Edit</a>    
                    </td>
                    <td>
                        <a href="{{ url('admin/delete-property/'.$item->id) }}" class="btn btn-danger">Delete</a>    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

</div>
@endsection
