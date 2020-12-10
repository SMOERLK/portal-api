<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School_channels extends Model{


     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_channels';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','channel_id','institution_id','created_at','updated_at'];

   
    public static function CreateOrUpdate($data)
    {
        $exist = self::query()->where([
            'channel_id' => $data['channel_id'],
            'school_id' => $data['school_id']
        ])->exists();
        if (!$exist) {
            self::create(
                [
                    'channel_id' => $data['channel_id'],
                    'school_id' => $data['school_id']
                ]
            );
        }
    }
}