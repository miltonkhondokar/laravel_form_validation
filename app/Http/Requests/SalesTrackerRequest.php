<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesTrackerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'entry_by' => 'regex:/^[a-zA-Z0-9 ]+$/',
            'buyer' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:255',
            'phone' => 'required|regex:/^[0-9]+$/|max:10',
            'buyer_email' => 'required|email|max:50',
            'city' => 'nullable|regex:/^[a-zA-Z ]+$/|max:20',
            'receipt_id' => 'required|regex:/^[a-zA-Z ]+$/|max:20',
            'items.*' => 'nullable|regex:/^[a-zA-Z ]+$/',
            'amount' => 'nullable|regex:/^[0-9]+$/|max:10',
            'note' => 'nullable|string|max:255',
        ];
    }



    public function messages()
    {
        return [
            'buyer.reuired' => 'The Buyer is required and cannot be empty.',
            'buyer.regex' => 'The Buyer allows only text, spaces and numbers, not more than 20 characters.',
            'buyer.max' => 'The Buyer allows not more than 20 characters.',

            'phone.reuired' => 'The Phone is required and cannot be empty. only numbers, and 880 will be automatically prepended.',
            'phone.regex' => 'The Phone allows only numbers, not more than 10 characters. only numbers, and 880 will be automatically prepended.',
            'phone.max' => 'The Phone allows not more than 10 characters. only numbers, and 880 will be automatically prepended.',

            'buyer_email.reuired' => 'The Email is required and cannot be empty.',
            'buyer_email.regex' => 'The Email allows only valid email address, not more than 50 characters.',
            'buyer_email.max' => 'The Email allows not more than 50 characters.',

            'receipt_id.reuired' => 'The Receipt ID is required and cannot be empty.',
            'receipt_id.regex' => 'The Receipt ID allows only text and not more than 20 characters.',
            'receipt_id.max' => 'The Receipt ID allows not more than 20 characters.',

            'city.regex' => 'The City allows only text and spaces and not more than 20 characters.',
            'city.max' => 'The City allows not more than 20 characters.',

            'amount.regex' => 'The Amount allows only numbers and spaces and not more than 10 digits.',
            'amount.max' => 'The Amount allows not more than 10 digits.',

            'note.regex' => 'The Note allows only text and spaces and not more than 255 characters.',
            'note.max' => 'The Note allows not more than 255 characters.',
        ];
    }
}
