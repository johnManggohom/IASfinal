<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
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
        $appointmentDate = Carbon::parse($value);
        $appointmentTime  = Carbon::createFromTime($appointmentDate->hour, $appointmentDate->minute, $appointmentDate->second);

        $earliestTime = Carbon::createFromTimeString('10:00:00');
        $lastTime = Carbon::createFromTimeString('20:00:00');

        return $appointmentTime->between($earliestTime, $lastTime) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please choose between open hours. 10:00 A.M - 8:00 P.M';
    }
}
