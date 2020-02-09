<?php

namespace App\Http\Requests;

use App\sensor;
use App\Home;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateSensorRequest extends FormRequest
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
            'name.required' => 'El campo nombre es obligatorio',
        ];
    }

    public function createSensor($home)
    {
        DB::transaction(function() use ($home){
            $data = $this->validated();
            
            $sensor = sensor::create([
                'name' => $data['name'],
                'active' => 0,
                'home_id' => $home,
            ]);
        });
    }
}
