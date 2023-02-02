<?php

namespace App\Http\Requests\ServiceProvider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    // protected function prepareForValidation() 
    // {
    //     $this->merge(['service_provider' => $this->route()->parameter('service_provider')]);
        
    // }

    public function rules()
    {

        if($this->isMethod('post')){
            
        return [
            'service_provider_name' => 'required|unique:service_providers,service_provider_name'
        ];
        }

        if($this->isMethod('put') &&  ($this->route()->parameter('service_provider'))){
            $id = $this->route()->parameter('service_provider');
           return [
            'service_provider_name' => ['required',Rule::unique('service_providers','service_provider_name')->ignore($id)]
               
            ];
        }

        if($this->isMethod('put') && ($this->route()->parameter('id'))){
            return [
                'status' => 'required|boolean'
            ];
        }


    }


}
