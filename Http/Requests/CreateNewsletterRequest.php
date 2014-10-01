<?php namespace Modules\Newsletter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsletterRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required |email |unique:newsletters,email',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*public function forbiddenResponse()
    {
        return $this->redirect->back();
    }*/

}
