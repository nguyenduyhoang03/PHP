<!-- resources/views/employees/create.blade.php -->

@extends('layout')

@section('content')
    <h1>Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="leave_days">Leave Days:</label><br>
        <input type="number" id="leave_days" name="leave_days"><br>
        <label for="work_days">Work Days:</label><br>
        <input type="number" id="work_days" name="work_days"><br>
        <label for="rate">Rate:</label><br>
        <input type="number" id="rate" name="rate"><br><br>
        <button type="submit">Submit</button>
    </form>
@endsection
