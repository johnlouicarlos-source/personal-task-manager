@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

<div class="page-header">
    <div>
        <h1>Add New Task</h1>
        <p>Create a task and keep track of your deadline.</p>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-warning">
        ← Back to Tasks
    </a>
</div>

<div class="card">

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                class="form-control"
                value="{{ old('task_name') }}"
                placeholder="Enter task name"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                class="form-control"
                placeholder="Enter task details..."
            >{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select
                id="status"
                name="status"
                class="form-control"
                required
            >
                <option value="Pending"
                    {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ old('status') === 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                class="form-control"
                value="{{ old('due_date') }}"
            >
        </div>

        <div class="form-actions">

            <button type="submit" class="btn btn-primary">
                + Save Task
            </button>

            <a href="{{ route('tasks.index') }}" class="btn btn-warning">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection