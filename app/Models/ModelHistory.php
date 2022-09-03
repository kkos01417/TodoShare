<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelHistory extends Model
{
  protected $fillable = ['model', 'model_id', 'user_id', 'operation_type'];
  use HasFactory;


  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }
  public function crud()
  {
    return $this->hasOne(
      Crud::class,
      'id',
      'model_id'
    )->withTrashed();
  }
}
