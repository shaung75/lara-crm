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

        <div class="card">

            <div class="header">
                <a href="{{ route('project.tasks.create', $project->id) }}" class="btn btn-default pull-right">Add task</a> 
                <h4 class="title">Tasks</h4>
                <p class="category">Backend development</p>
            </div>
            <div class="content">
                @if($project->tasks->count())

                    <div class="table-full-width">
                        <table class="table">
                            <tbody>

                                @foreach($project->tasks->sortBy('completed') as $task)
                                    <tr>
                                        <td style="width: 20px;">
                                            <form method="POST" action="{{ route('task.update', [$task->project->id, $task->id]) }}">
                                                @csrf
                                                @method('PATCH')

                                                <div class="checkbox">
                                                    <input id="checkbox{{ $task->id }}" type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} onChange="this.form.submit()">
                                                    <label for="checkbox{{ $task->id }}"></label>
                                                </div>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('task.edit', [$task->project->id, $task->id]) }}">{{ $task->title }}</a></td>
                                        <td class="td-actions text-right">
                                            <form method="POST" action="{{ route('task.delete', $task->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                @else

                    <div class="alert alert-danger">This project has no open tasks</div>

                @endif

                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
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