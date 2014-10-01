<?php namespace Modules\SimpleNewsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class SimpleNewsletter extends Model {

    protected $table = "newsletters";

    protected $fillable = ['email'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}