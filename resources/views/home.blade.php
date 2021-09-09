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
{{-- <th scope="row">1</th> --}}

{{-- forelse START --}}
@forelse ($todos as $todo)
<tr>
{{-- @if ($todo->completed)
<td>{{ $todo->title }}</td>
@else --}}

<td>{{ $todo->title }}</td>
<td>{{ $todo->description }}</td>
{{-- @endif --}}
<td>
<a href="{{ route('todo.edit', $todo->id) }}">
    <button type="button" class="btn btn-warning">Edit</button>
</a>
</td>


{{-- <a href="{{ route('todo.destroy', $todo->id) }}">
    <button type="button" class="btn btn-danger">Delete</button>
</a> --}}

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
