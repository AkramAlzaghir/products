<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supermarket extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'detail'];
    //delete at is colomn it created for a soft delete
    protected $date = ['deleted_at']; // to recognize that the delete will be soft delete
}
