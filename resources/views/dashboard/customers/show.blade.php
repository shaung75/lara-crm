@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | <a href="{{ route('customers') }}">Customers</a> | {{ $customer->company }}
</p>

<div class="row">
    <div class="col-md-8">
        @if ($customer->projects->count())
            <div class="card">
                <div class="header">
                    <a href="/customers/{{ $customer->id }}/projects/create" class="btn btn-default pull-right">Add Project</a>
                    <h4 class="title">Projects</h4>
                    <p class="category">Projects for {{ $customer->company }}</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th class="text-center">Open Tasks</th>
                            <th></th>
                        </thead>
                        <tbody>

                            @foreach($customer->projects as $project)
                                <tr>
                                    <td><a href="/projects/{{ $project->id }}">#{{ $project->id }}</a></td>
                                    <td><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></td>
                                    <td class="text-center">{{ $project->tasks->where('completed', 0)->count() }}</td>
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
        @else
            <div class="alert alert-danger">{{ $customer->company }} has no projects!</div>
            <p><a href="/customers/{{ $customer->id }}/projects/create" class="btn btn-default">Add a Project</a></p>
        @endif

        @if ($customer->tasks->count())
            <div class="card">
                <div class="header">
                    <h4 class="title">Tasks</h4>
                    <p class="category">All task</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th>Task</th>
                            <th>Project</th>
                            <th></th>
                        </thead>
                        <tbody>

                            @foreach($customer->tasks->sortBy('completed') as $task)
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
                                    <td>
                                        <a href="{{ route('task.edit', [$task->project->id, $task->id]) }}">{{ $task->title }}</a>
                                    </td>
                                    <td>
                                        {{ $task->project->name }}
                                    </td>
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
            </div>
        @else

        @endif
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <a href="{{ route('customers.invoices', $customer->id) }}" class="btn btn-default pull-right">Invoices</a>
                <a href="{{ route('customers.quotes', $customer->id) }}" class="btn btn-default pull-right">Quotes</a>
                <h4 class="title" style="line-height: 2.2em">Account Balance: &pound;{{ number_format($customer->balance(), 2, '.', ',') }}</h4>
            </div>
        </div>
        <div class="card card-user">
            <div class="image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-gray" src="https://www.gravatar.com/avatar/{{ $customer->gravatar }}" alt="{{ $customer->firstname}} {{ $customer->lastname }}"/>

                    <h4 class="title">{{ $customer->company }}<br />
                        <small>{{ $customer->firstname}} {{ $customer->lastname }}</small>
                    </h4>
                    <p><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></p>
                    <p>{{ $customer->address }}</p>
                    <p>{{ $customer->town }}, {{ $customer->county }}, {{ $customer->postcode }}</p>
                    <p>{{ $customer->telno }}</p>
                </div>
                <p class="description text-center">Notes: <br/>{{ $customer->notes }}</p>
            </div>
            <hr>
            <div class="text-center">
                <p><a href="/customers/{{ $customer->id }}/edit" class="btn btn-default">Edit</a></p>
            </div>
        </div>
    </div>

</div>

@endsection