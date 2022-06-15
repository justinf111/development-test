@csrf
<div class="form-outline mb-4">
    <label class="form-label" for="email">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $company->name ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'name'])
</div>

<div class="form-outline mb-4">
    <label class="form-label" for="email">Website</label>
    <input type="text" name="website" id="website" value="{{ old('website', $company->website ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'website'])
</div>

<div class="form-outline mb-4">
    <label class="form-label" for="email">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ old('phone', $company->phone ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'phone'])
</div>

<div class="form-outline mb-4">
    <div>
        <label class="form-label" for="email">Logo</label>
    </div>
    @if(isset($company))
        <img height="200" src="{{$company->logo}}" alt="{{$company->name}} Logo" class="mb-3">
    @endif
    <input type="file" name="logo" id="logo" class="form-control"/>
    @include('partials._errors', ['field' => 'logo'])
</div>
