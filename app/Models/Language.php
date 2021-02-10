<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['abbr', 'locale', 'name', 'direction', 'active'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeSelection($query)
    {
        return $query->select('id', 'abbr', 'name',  'direction', 'active'); # code...
    }
    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غيرمفعل';
    }
}
