@extends('layouts.master')
@section('title', 'Properties')
@section ('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Properties</h4>
        </div>
        <div class="card-body">
            
            @if ($errors -> any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form form action="{{ url('admin/update-property/'.$property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Property Name</label>
                    <input type="text" name="name" value="{{ $property->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $property->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Price</label>
                    <input type="text" name="price" value="{{ $property->price }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" value="{{ $property->image }}">
                </div>

                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $property->status == '1' ? 'checked':'' }} />
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
