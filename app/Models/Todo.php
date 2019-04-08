<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Todo extends Model
{
    use UsesTenantConnection;

    protected $fillable = ['title','description','due_date','status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
