<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskBoard extends Component
{
    public $tasks;
    public $newTaskTitle = '';
    public $newTaskDescription = '';
    public $statuses = ['To Do', 'In Progress', 'Review', 'Done'];
    public $editingTask = null;

    protected $rules = [
        'newTaskTitle' => 'required|min:3',
        'newTaskDescription' => 'nullable',
    ];

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $tasks = Task::orderBy('position')->get();
        $this->tasks = $tasks->groupBy('status')->toArray();
    }

    public function addTask()
    {
        $this->validate();

        $maxPosition = Task::where('status', 'To Do')->max('position') ?? 0;

        Task::create([
            'title' => $this->newTaskTitle,
            'description' => $this->newTaskDescription,
            'status' => 'To Do',
            'position' => $maxPosition + 1,
            'user_id' => Auth::id(),
        ]);

        $this->newTaskTitle = '';
        $this->newTaskDescription = '';
        $this->loadTasks();
    }

    public function moveTask($taskId, $newStatus)
    {
        $task = Task::find($taskId);
        $oldStatus = $task->status;
        $task->status = $newStatus;

        // Update positions
        if ($oldStatus !== $newStatus) {
            $maxPosition = Task::where('status', $newStatus)->max('position') ?? 0;
            $task->position = $maxPosition + 1;
        }

        if ($newStatus === 'Done' && !$task->completed_at) {
            $task->completed_at = now();
        } elseif ($newStatus !== 'Done') {
            $task->completed_at = null;
        }

        $task->save();
        $this->loadTasks();
    }

    public function startEditing($taskId)
    {
        $this->editingTask = Task::find($taskId);
    }

    public function updateTask()
    {
        $this->validate([
            'editingTask.title' => 'required|min:3',
            'editingTask.description' => 'nullable',
        ]);

        $this->editingTask->save();
        $this->editingTask = null;
        $this->loadTasks();
    }

    public function deleteTask($taskId)
    {
        Task::destroy($taskId);
        $this->loadTasks();
    }

    public function render()
    {
        return view('roadmap')
            ->layout('layouts.app');
    }
}
