@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>
    <form action="{{route('employees.index')}}" method="post">
        @include('employees.form')
        <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
    </form>
@endsection
