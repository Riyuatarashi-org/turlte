<?php

namespace App\Http\Requests;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        if (!$user instanceof User) {
            return false;
        }

        return $user->can('create', Message::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array<string>|string>
     */
    public function rules(): array
    {
        return [
            'message'      => [ 'required', 'string', 'max:65535' ],

            // Relations
            'author_id'    => [ 'required', 'integer', 'exists:users,id' ],
            'recipient_id' => [ 'nullable', 'integer', 'exists:users,id' ],

            // Timestamps
            'sent_at'      => [ 'required', 'date_format:Y-m-d H:i:s' ],
            'received_at'  => [ 'nullable', 'date_format:Y-m-d H:i:s' ],
            'read_at'      => [ 'nullable', 'date_format:Y-m-d H:i:s' ],
        ];
    }
}
