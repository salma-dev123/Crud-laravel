<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreArticleRequest extends FormRequest
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

    protected function prepareForValidation():void {
        $this->merge(
            [
                'slug'=> $this->input('slug') ?: Str::slug($this->input('title'))
            ]
            );
    }

    public function rules(): array
    {
        return [
            'title' => ['required','string','min:3','max:150'],
            'slug' => ['required','string','max:180','unique:articles,slug'],
            'content' => ['required','string','min:20'],
        ];
    }

    public function messages(): array{
        return [
            'title.required' => 'le titre est obligatoire.',
            'content.min' => 'Le contenu doit contenir au moins :min caractères.',
            'slug.unique' => 'Ce slug est déjà utilisé pour un autre article.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title'   => 'titre',
            'slug'    => 'slug',
            'content' => 'contenu',
        ];
    }
}
