<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelHistoryTrait;

class Crud extends Model
{
  use ModelHistoryTrait;
  use SoftDeletes;
  use HasFactory;
  protected $fillable = ['task_name', 'estimate_hour', 'assign_person_name', 'task_description', 'deleted_at'];
  protected $dates = ['deleted_at'];
  public static function boot()
  {
    parent::boot();

    self::saveModelHistory(['deleted', 'updated', 'created']);
  }
}
