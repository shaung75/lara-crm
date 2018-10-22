@extends ('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if (count($user->projects) === 0 )
        
            <div class="alert alert-danger">You have no projects</div>
        
        @else 

        <div class="card">
            <div class="header">
                <h4 class="title">All Projects</h4>
                <p class="category">Stuff to work on</p>
            </div>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Customer</th>
                    </thead>
                    <tbody>

                        @foreach($user->projects as $project)
                            <tr>
                                <td><a href="/projects/{{ $project->id }}">#{{ $project->id }}</a></td>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></td>
                                <td><a href="/customers/{{ $project->customer->id}}">{{ $project->customer->company }}</a></td>
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