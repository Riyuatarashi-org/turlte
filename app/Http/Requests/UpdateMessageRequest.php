<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        if (! $user instanceof User) {
            return false;
        }

        return $user->can('update', Message::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>|\Illuminate\Contracts\Validation\Rule|string>
     */
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:65535'],

            // Relations
            'author_id' => ['prohibited'],
            'recipient_id' => ['prohibited'],

            // Timestamps
            'sent_at' => ['prohibited'],
            'received_at' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'read_at' => ['nullable', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
