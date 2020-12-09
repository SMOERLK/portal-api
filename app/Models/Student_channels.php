<?php

namespace App\Models;

use Highlight\Mode;
use Illuminate\Database\Eloquent\Model;

class Student_channels extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_channels';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'channel_id', 'student_id', 'created_at', 'updated_at'];

    public static function CreateOrUpdate($data)
    {
        $exist = self::query()->where([
            'channel_id' => $data['channel_id'],
            'student_id' => $data['student_id']
        ])->exists();
        if (!$exist) {
            self::create(
                [
                    'channel_id' => $data['channel_id'],
                    'student_id' => $data['student_id']
                ]
            );
        }
    }
}
