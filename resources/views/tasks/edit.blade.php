@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Task</h1>
        <p>Update your task information or status.</p>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-warning">
        ← Back to Tasks
    </a>
</div>

<div class="card">

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                class="form-control"
                value="{{ old('task_name', $task->task_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                class="form-control"
            >{{ old('description', $task->description) }}</textarea>
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
                    {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>
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
                value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
            >
        </div>

        <div class="form-actions">

            <button type="submit" class="btn btn-primary">
                Save Changes
            </button>

            <a href="{{ route('tasks.index') }}" class="btn btn-warning">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection