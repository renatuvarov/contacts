<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AddContactRequest extends FormRequest
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
            'contact_id' => 'required|integer|in:' . $this->getCorrectIds(),
        ];
    }

    public function messages()
    {
        return [
            'contact_id.required' => 'некорректный контакт',
            'contact_id.integer' => 'некорректный контакт',
            'contact_id.in' => 'некорректный контакт',
        ];
    }

    private function getCorrectIds(): string
    {
        $user = $this->user();

        $favoriteIds = $user->favorites->pluck('id')->toArray();
        $contactIds = User::query()->where('id', '!=', $user->id)->pluck('id')->toArray();

        $correctIds = array_filter($contactIds, fn($contactId) => ! in_array($contactId, $favoriteIds, true));

        return implode(',', $correctIds);
    }
}
