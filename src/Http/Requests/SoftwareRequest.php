<?php

namespace Adminetic\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SoftwareRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => !is_null($this->name) ? Str::slug($this->name) : null,
            'meta_name' => $this->software->meta_name ?? $this->meta_name ?? $this->name ?? null,
            'meta_description' => $this->software->meta_description ?? $this->meta_description ?? $this->excerpt ?? null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->software->id ?? '';

        return [
            'slug' => 'required|max:100|unique:' . config('website.table_prefix', 'website') . '_categories,slug,' . $id,
            'name' => 'required|max:100|unique:' . config('website.table_prefix', 'website') . '_categories,name,' . $id,
            'type' => 'nullable|max:255',
            'excerpt' => 'nullable|max:5500',
            'description' => 'nullable|max:55000',
            'url' => 'nullable|max:255',
            'data' => 'nullable',
            'active' => 'sometimes|boolean',
            'featured' => 'sometimes|boolean',
            'position' => 'nullable|numeric',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'meta_name' => 'nullable|max:100',
            'meta_description' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:100',
        ];
    }
}
