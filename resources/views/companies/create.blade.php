@extends('layouts.app')

@section('content')
    <h1>Create Company</h1>
    <form action="{{route('companies.index')}}" method="post" enctype="multipart/form-data">
        @include('companies.form')
        <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
    </form>
@endsection
