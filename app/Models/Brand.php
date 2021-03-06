<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=['name', 'slug', 'status', 'create_by'];

    public function user(){
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name');
    }

    public function getStatusAttribute($value){
        return ucfirst($value);
    }
}
