@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="col justify-content-between d-flex">
                    <span>My Websites</span>
                    <a href="{{ route("websites.new") }}" class="btn btn-primary">Create New</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    @foreach ($websites as $website)
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $website->name }}</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" target="__blank" class="btn btn-primary">View</a>
                                    <a href="#" target="__blank" class="btn btn-secondary-outline">Edit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
@endsection
