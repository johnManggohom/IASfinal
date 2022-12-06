<?php

namespace App\Rules;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class AppointmentOverlap implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
                
        return Appointment::where('start_time', '<=', $value)->where('end_time', '>=', Carbon::parse( $value)->addHour())->count()===0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Appointment overlaps with exisitng appointment.';
    }
}
