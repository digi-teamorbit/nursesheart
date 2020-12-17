<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientSignup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_signups';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'address', 'city', 'state', 'zip', 'date_of_birth', 'phone', 'insurance_company_name', 'insurance_number', 'group_number', 'insurance_card', 'driver_liscence', 'ssn', 'type', 'state_id', 'ticket_number'];

    
}
