<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGoodsRequest extends FormRequest
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
            'code' => 'required|max:4',
            'name' => 'required|max:50',
            'price' => 'required'
        ];
    }

    public function code(): string
    {
        return $this->input('code');
    }

    public function name(): string
    {
        return $this->input('name');
    }

    public function price(): int
    {
        return $this->input('price');
    }

    public function description(): ?string
    {
        return $this->input('description');
    }

}