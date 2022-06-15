@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center">
        <h1>Companies</h1>
        <a href="{{route('companies.create')}}" class="ms-2 btn btn-primary btn-sm">Add New</a>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Website</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td class="text-center"><img height="200" src="{{$company->logo}}" alt="{{$company->name}} Logo"></td>
                <td>{{$company->name}}</td>
                <td>{{$company->phone}}</td>
                <td>{{$company->website}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('companies.edit', ['company' => $company->id])}}" class="btn btn-primary btn-sm me-2">Edit</a>
                        <form action="{{route('companies.delete', ['company' => $company->id])}}" method="post">
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

    {{$companies->links()}}
@endsection
