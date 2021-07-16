<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shanmuga\LaravelEntrust\Models\EntrustRole;

class Role extends EntrustRole
{
    use HasFactory;

    protected $fillable =['name','display_name','description'];


}
