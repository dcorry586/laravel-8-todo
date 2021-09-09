@extends('layouts.app')

@section('content')

    <a href="{{ route('todo.create') }}">
        {{-- Add Button --}}
        <button type="button" class="btn btn-success w-100">Add</button>                                
        </a>

{{-- Dashboard Table --}}
<table class="table">
<thead class="table-dark">
<tr>
<th scope="col">Title</th>
<th scope="col">Description</th>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
</tr>
</thead>
<tbody class="bg-light">
<tr>

{{-- forelse START --}}
@forelse ($todos as $todo)
<tr>

<td>{{ $todo->title }}</td>
<td>{{ $todo->description }}</td>

<td>
<a href="{{ route('todo.edit', $todo->id) }}">
    <button type="button" class="btn btn-warning">Edit</button>
</a>
</td>

<td>
<form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
</form>

</td>
</tr>
@empty
<td>
No Items Added!
</td>
@endforelse
{{-- forelse END --}}

</tr>
</tbody>
</table>

@endsection
