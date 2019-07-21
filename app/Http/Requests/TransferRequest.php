<?php

namespace App\Http\Requests;

use App\Rules\EnoughMoney;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipient_id' => ['Required', 'Numeric', 'exists:users,user_id'],
            'amount' => ['Required', 'Numeric', new EnoughMoney()],
        ];
    }
}
