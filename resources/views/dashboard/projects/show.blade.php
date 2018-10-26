@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('customers') }}">Customers</a> | 
    <a href="{{ route('customer', $project->customer->id) }}">{{ $project->customer->company }}</a> | 
    {{ $project->name }}
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">{{ $project->name }}</h4>
            </div>

            <div class="content">
                <p class="category">{{ $project->description }}</p>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-gray" src="https://www.gravatar.com/avatar/{{ $project->customer->gravatar }}" alt="{{ $project->customer->firstname}} {{ $project->customer->lastname }}"/>

                    <h4 class="title">{{ $project->customer->company }}<br />
                        <small>{{ $project->customer->firstname}} {{ $project->customer->lastname }}</small>
                    </h4>
                    <p><a href="mailto:{{ $project->customer->email }}">{{ $project->customer->email }}</a></p>
                    <p>{{ $project->customer->address }}</p>
                    <p>{{ $project->customer->town }}, {{ $project->customer->county }}, {{ $project->customer->postcode }}</p>
                    <p>{{ $project->customer->telno }}</p>
                </div>
                <p class="description text-center">Notes: <br/>{{ $project->customer->notes }}</p>
            </div>
            <hr>
            <div class="text-center">
                <p><a href="/customers/{{ $project->customer->id }}/edit" class="btn btn-default">Edit</a></p>
            </div>
        </div>
    </div>

</div>

@endsection