<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class AccountantVacation extends Model
{
    use HasFactory,HasRoles,HasPermissions;
    protected $fillable=['fromH','untilH','firstDay','lastDay','accountant_id','accountant_name','created_by'];

    public function user()
    {
      $this->belongsTo(User::class)->where('created_by','=',Auth::user()->created_by);
    }
}
