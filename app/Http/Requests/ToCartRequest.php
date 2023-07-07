<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToCartRequest extends FormRequest
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
            'quantity' => 'numeric|min:0', // 型の指定大事
        ];
    }

    public function goodscode(): string
    {
        return $this->input('goodscode');
    }

    public function price(): int
    {
        return $this->input('price');
    }

    public function quantity(): int
    {
        return $this->input('quantity');
    }

    /*
    public function userid()
    {
        return auth()->id();
    }
    */
}
