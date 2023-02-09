<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level2 extends Model
{
    protected $table = 'level_2';

    protected $fillable = [
        'uuid',
        'level_1_id',
        'name',
        'is_active',
    ];
    
    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }

    /**
    * Get the route key for the model.
    *
    * @return string
    */
   public function getRouteKeyName()
   {
       return 'uuid';
   }
   
    /**
     * boot
     */
    protected static function boot ()
    {
    	parent::boot();

        static::creating(function ($model) {
            $model->uuid = getUuid();
        });
        
    }
}
