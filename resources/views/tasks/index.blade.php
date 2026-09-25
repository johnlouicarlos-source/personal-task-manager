@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

<div class="page-header">

    <div>
        <h1>My Tasks</h1>
        <p>Manage your personal tasks and deadlines.</p>
    </div>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Add New Task
    </a>

</div>

<div class="card">

    @if($tasks->count() > 0)

        <table class="task-table">

            <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tasks as $task)

                    <tr>

                        <td>
                            <strong>{{ $task->task_name }}</strong>
                        </td>

                        <td>
                            {{ $task->description ?: 'No description' }}
                        </td>

                        <td>
                            {{ $task->due_date
                                ? $task->due_date->format('M d, Y')
                                : 'No due date'
                            }}
                        </td>

                        <td>

                            @if($task->status === 'Completed')

                                <span class="status status-completed">
                                    Completed
                                </span>

                            @else

                                <span class="status status-pending">
                                    Pending
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('tasks.edit', $task) }}"
                                    class="btn btn-warning"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="empty-state">

            <div class="empty-icon">
                ✓
            </div>

            <h2>No tasks yet</h2>

            <p>Create your first task to get started.</p>

            <a
                href="{{ route('tasks.create') }}"
                class="btn btn-primary"
            >
                + Add Your First Task
            </a>

        </div>

    @endif

</div>

@endsection