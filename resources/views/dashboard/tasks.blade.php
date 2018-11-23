@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    Tasks
</p>

<div class="row">
    <div class="col-md-8">
        
        @if (count($user->tasks()) === 0 )
        
            <div class="alert alert-danger">You have no Tasks</div>
        
        @else 

        <div class="card">
            <div class="header">
                <h4 class="title">All Tasks</h4>
                <p class="category">Stuff to work on</p>
            </div>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    
                    <tbody>

                        @foreach($user->customer as $customer)
                            @foreach($customer->tasks as $task)
                                @if(!$task->completed)
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
                                            {{ $task->project->customer->company }}
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
                                @endif
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        
        @endif
        
    </div>
</div>

@endsection