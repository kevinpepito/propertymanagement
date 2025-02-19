@extends('layouts.app')

@section('content')
    @php
        $properties = App\Models\Property::where('status','0')->get();
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card d-flex flex-row justify-content-evenly">
                @foreach ( $properties as $item )
                    <div class="nav-item">
                        <img src="{{ asset('uploads/property/'.$item->image) }}" width="100px" height="100px" alt="Img">
                        <p> {{ $item-> name}} </p>
                        <p> {{ $item-> description}} </p>
                        <p> {{ $item-> price}} </p>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection