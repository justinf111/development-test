@csrf
<div class="form-outline mb-4">
    <label class="form-label" for="email">First Name</label>
    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $employee->first_name ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'first_name'])
</div>

<div class="form-outline mb-4">
    <label class="form-label" for="email">Last Name</label>
    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'last_name'])
</div>

<div class="form-outline mb-4">
    <label class="form-label" for="email">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ old('phone', $employee->phone ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'phone'])
</div>

<div class="form-outline mb-4">
    <label class="form-label" for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $employee->email ?? '') }}" class="form-control"/>
    @include('partials._errors', ['field' => 'email'])
</div>

<div class="form-outline mb-4">
    <label class="form-label" for="email">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        @foreach($companies as $company)
            <option
                value="{{$company->id}}"
                @if(old('company_id',$employee->company->id ?? '') == $company->id)
                    selected
                @endif
            >
                {{$company->name}}
            </option>
        @endforeach
    </select>
    @include('partials._errors', ['field' => 'company_id'])
</div>


