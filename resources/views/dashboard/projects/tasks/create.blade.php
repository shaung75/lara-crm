@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('customers') }}">Customers</a> | 
    <a href="{{ route('customer', $project->customer->id) }}">{{ $project->customer->company }}</a> |
    <a href="{{ route('project', $project->id) }}">{{ $project->name }}</a> |
    Add Task
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Add Task to project: {{ $project->name }}</h4>
            </div>
            <div class="content">
                <form method="POST" action="/projects/{{ $project->id }}/tasks">
                    
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea rows="5" class="form-control" name="notes" placeholder="Task notes">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Task</button>
                    <div class="clearfix"></div>
                </form>
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