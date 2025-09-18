<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverNoteType extends Model
{
   protected $fillable = [
       'name',
       'description',
   ];
}
