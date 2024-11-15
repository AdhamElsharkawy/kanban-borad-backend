<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoardRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:50',
            'mobile' => 'required|string|unique:boards,mobile,' .  $this->route('member'),
            'email' => 'required|email|unique:boards,email,' .  $this->route('member'),
            'age' => 'required|integer|min:18|max:80',
            'status' => 'required|string|in:sent_to_therapists,preparing_offer,first_contact,unclaimed'
        ];
    }
}
