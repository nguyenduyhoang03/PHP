<!-- resources/views/employees/show.blade.php -->

@extends('layout')

@section('content')
    <h1>Employee Details</h1>
    <p>Name: {{ $employee->name }}</p>
    <p>Leave Days: {{ $employee->leave_days }}</p>
    <p>Work Days: {{ $employee->work_days }}</p>
    <p>Rate: {{ $employee->rate }}</p>
    <p>Performance Score: {{ $employee->performance_score }}</p>
    <a href="{{ route('employees.edit', $employee) }}">Edit</a>
@endsection
