<?php

namespace App\Http\Requests;

use App\Models\WhatsappStoreProduct;
use Illuminate\Foundation\Http\FormRequest;

class CreateWhatsappStoreProductRequest extends FormRequest
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
        $rules = WhatsappStoreProduct::$rules;

        $maxSizeInKilobytes = 2048; // 2MB default
        
        // Check condition: allow 10MB for specific whatsapp_store_id
        if ((int)$this->input('whatsapp_store_id') === 58) {
            $maxSizeInKilobytes = 10240; // 10MB
        }
        
        // Override the image validation
        $rules['images.*'] = 'image|mimes:jpg,png,jpeg|max:' . $maxSizeInKilobytes;

        return $rules;
    }

    public function messages()
    {
        return [
            'currency_id.exists' => __('messages.flash.currency_required'),
            'category_id.exists' => __('messages.flash.category_required'),
        ];
    }
}
