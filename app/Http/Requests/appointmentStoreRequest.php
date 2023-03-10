<?php

namespace App\Http\Requests;

use App\Rules\AppointmentOverlap;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class appointmentStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            // 'time'=>'required',
            // 'date'=>'required',
            'dresser_id'=>'required',
            'service_id'=> 'required',
            // 'appointment_price'=> 'required',
             'start_time'=>['required', new AppointmentOverlap(), new TimeBetween()], 
            // 'end_time' => 'required', 
        ];
    }
}
