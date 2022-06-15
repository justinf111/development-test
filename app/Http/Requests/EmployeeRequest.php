<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'company_id' => 'exists:companies,id'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function passedValidation()
    {
        $employee = $this->route('employee');
        if($employee != null) {
            $employee->update($this->except(['_method','_token']));
        } else {
            Employee::create($this->except(['_method','_token']));
        }
    }
}
