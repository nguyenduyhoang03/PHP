<!-- resources/views/employees/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $employee->name }}"><br>
        <label for="leave_days">Leave Days:</label><br>
        <input type="number" id="leave_days" name="leave_days" value="{{ $employee->leave_days }}"><br>
        <label for="work_days">Work Days:</label><br>
        <input type="number" id="work_days" name="work_days" value="{{ $employee->work_days }}"><br>
        <label for="rate">Rate:</label><br>
        <input type="number" id="rate" name="rate" value="{{ $employee->rate }}"><br><br>
        <button type="submit">Submit</button>
    </form>
@endsection
