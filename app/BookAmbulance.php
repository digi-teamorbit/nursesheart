<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAmbulance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'book_ambulances';

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
    protected $fillable = ['facility_name', 'patient_name', 'address', 'city', 'state', 'zip', 'phone', 'email', 'date_of_transport', 'time_of_transport'];

    
}
