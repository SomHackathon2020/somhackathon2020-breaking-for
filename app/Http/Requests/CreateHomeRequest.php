<?php

namespace App\Http\Requests;

use App\Home;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateHomeRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio'
        ];
    }

    public function createHome()
    {
        DB::transaction(function(){
            $data = $this->validated();

            $home = Home::create([
                'name' => $data['name'],
            ]);
        });
    }
}
