@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    <form action="{{route('employees.update', ['employee' => $employee->id])}}" method="post">
        @method('PUT')
        @include('employees.form')
        <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
    </form>
@endsection
