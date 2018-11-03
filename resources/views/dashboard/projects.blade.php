@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    Projects
</p>

<div class="row">
    <div class="col-md-8">
        
        @if (count($user->projects) === 0 )
        
            <div class="alert alert-danger">You have no projects</div>

            <a href="{{ route('projects.create') }}" class="btn btn-default">Add Project</a>
        
        @else 

        <div class="card">
            <div class="header">
                <a href="{{ route('projects.create') }}" class="btn btn-default pull-right">Add Project</a>
                <h4 class="title">All Projects</h4>
                <p class="category">Stuff to work on</p>
            </div>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Customer</th>
                        <th></th>
                    </thead>
                    <tbody>

                        @foreach($user->projects as $project)
                            <tr>
                                <td><a href="/projects/{{ $project->id }}">#{{ $project->id }}</a></td>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></td>
                                <td><a href="/customers/{{ $project->customer->id}}">{{ $project->customer->company }}</a></td>
                                <td>
                                    <form method="POST" action="{{ route('project.delete', $project->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        
        @endif
        
    </div>
</div>

@endsection