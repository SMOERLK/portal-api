<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School_utilities extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_utilities';
    
    /**
     * Attributes that should be mass-assignable.
     * 
     *
     * @var array
     */
    protected $fillable = ['institution_id', 'has_internet_connection', 'has_electricity', 'has_telephone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public static function CreateOrUpdate($additional_data){
        try {
            $exist = self::query()->where('institution_id',$additional_data['institution_id'])->exists();
            if(!$exist ){
                $data = new School_utilities();
                $data->institution_id = $additional_data['institution_id'];
                $data->has_internet_connection = $additional_data['has_internet_connection'];
                $data->has_electricity = $additional_data['has_electricity'];
                $data->has_telephone = $additional_data['has_telephone'];
                $data->save();
                return $data;   
            }else{
                self::query()->where('institution_id',$additional_data['institution_id'])->update($additional_data);
                return $additional_data;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
