<?php

namespace App\Traits;

use App\Models\ModelHistory;

trait ModelHistoryTrait
{

  public static function saveModelHistory($types = ['created', 'updated', 'deleted', 'retrieved'])
  {

    if (auth()->check()) {

      foreach ($types as $type) {

        forward_static_call([__CLASS__, $type], function ($model) use ($type) {

          $user = auth()->user();
          $history = new ModelHistory();
          $history->model = get_class($model);
          $history->model_id = $model->id;
          $history->user_id = $user->id;
          $history->operation_type = $type;
          $history->save();
        });
      }
    }
  }

  // Relationship
  public function model_histories()
  {

    return $this->hasMany(ModelHistory::class, 'model_id', 'id')
      ->where('model', __CLASS__);
  }
}
