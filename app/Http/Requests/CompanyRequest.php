<?php

namespace App\Http\Requests;

use App\Mail\CompanyCreatedMail;
use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class CompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function passedValidation()
    {
        $company = $this->route('company');
        $data = $this->except(['_method','_token', 'logo']);

        if($this->logo) {
            $filename = strtolower(str_replace(' ', '', $this->name)).'-logo'.$this->logo->extension();
            $this->logo->move(public_path('images/logos/'), $filename);
            $data = array_merge($data, ['logo' => asset('images/logos/'.$filename)]);
        }
        if($company != null) {
            $company->update($data);
        } else {
            $company = Company::create($data);
            Mail::to(auth()->user())->send(new CompanyCreatedMail($company));
        }
    }
}
