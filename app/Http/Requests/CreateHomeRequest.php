<?php

namespace App\Http\Requests;

use App\Home;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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
            'name.required' => 'El campo nombre es obligatorio',
        ];
    }

    public function createHome($token_home)
    {

        $home_found = DB::table('home')->where('token_home', $token_home)->get();

        if($home_found->isNotEmpty()){
            DB::table('home')->where('id',$home_found[0]->id)->update(['user2_id' => auth()->user()->id]);
        }else{
            DB::transaction(function(){
                $data = $this->validated();

                $home = Home::create([
                    'name' => $data['name'],
                    'user1_id' => auth()->user()->id,
                    'token_home' => Str::random(8),
                ]);
            });
        }
    }
}
