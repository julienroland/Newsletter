<?php namespace Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

    protected $table = "newsletters";

    protected $fillable = ['email'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}