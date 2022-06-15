@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center">
        <h1>Employees</h1>
        <a href="{{route('employees.create')}}" class=" ms-2 btn btn-primary btn-sm">Add New</a>
    </div>

    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Company</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->company->name}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('employees.edit', ['employee' => $employee->id])}}" class="btn btn-primary btn-sm me-2">Edit</a>
                        <form action="{{route('employees.delete', ['employee' => $employee->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$employees->links()}}
@endsection
