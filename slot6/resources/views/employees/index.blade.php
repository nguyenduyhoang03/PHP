<!-- resources/views/index.blade.php -->

@extends('layout')

@section('content')
    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}">Add New Employee</a>
    <ul>
        @foreach ($employees as $employee)
            <li>{{ $employee->name }} - <a href="{{ route('employees.show', $employee) }}">View</a> | <a href="{{ route('employees.edit', $employee) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
