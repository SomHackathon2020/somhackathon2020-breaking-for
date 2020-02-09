<?php

namespace App\Http\Requests;

use App\Recordatori;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateRecordatoriRequest extends FormRequest
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
            'hora' => 'required',
            'home_id'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'hora.required' => 'El campo hora es obligatorio',
            'home_id.required' => 'El campo home_id es obligatorio'
        ];
    }

    public function createRecordatori()
    {
        DB::transaction(function(){
            $data = $this->validated();

            $recordatori = Recordatori::create([
                'name' => $data['name'],
                'hora' => $data['hora'],
                'home_id' => $data['home_id'],
                'activa'=> false,
            ]);
        });
    }
}
