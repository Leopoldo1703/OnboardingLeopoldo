@component('mail::message')
# Task Assigned

You have been assigned a new task: **{{ $task->title }}**.<br>
Assigned on: **{{ $task->updated_at->format('l, d/m/Y') }}**.

## Task Description

{{ $task->description }}

Please review it at your earliest convenience.

Thanks,<br>
Light-it
@endcomponent