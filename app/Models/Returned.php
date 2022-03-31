<?php

namespace App\Models;

use App\Models\Borrowed;
use Illuminate\Database\Eloquent\Model;

class Returned extends Model
{
  protected $fillable = [
    'borrowed_id', 
    'return_confirmation'
  ];

  public function borrowed()
  {
    return $this->belongsTo(Borrowed::class, 'borrowed_id');
  }
}
