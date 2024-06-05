<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'depan' => 'required',
            'belakang' => 'required',
            'email' => 'required',
            'lahir' => 'required',
            'alamat' => 'required',
            'telpon' => 'required|min:12|max:15',
            'foto_diri' => 'required|mimes:png,jpg',
            'foto_ktp' => 'required|mimes:png,jpg',
            'foto_sim' => 'required|mimes:png,jpg'
        ];
    }
}
