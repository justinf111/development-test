@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>
    <form action="{{route('companies.update', ['company' => $company->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('companies.form')
        <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
    </form>
@endsection
