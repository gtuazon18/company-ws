<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Companies extends Model
{
    use Notifiable;

    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'email_verified',
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
