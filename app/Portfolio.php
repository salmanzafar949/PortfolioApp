<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $fillable = ['user_id','p_name', 'p_url', 'p_desc', 'P_organization'];

     public function p_user()
    {
        return $this->belongsTo('App\User');
    }
}
