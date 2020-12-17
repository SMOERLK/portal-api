<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_additional_data extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_additional_data';
    
    /**
     * Attributes that should be mass-assignable.
     * 
     *
     * @var array
     */
    protected $fillable = ['student_id', 'type_of_device', 'type_of_device_at_home', 'internet_at_home', 'internet_device', 'institution_id', 'tv_at_home', 'satellite_tv__at_home'];

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
            $exist = self::query()->where('student_id',$additional_data['student_id'])->exists();
            if(!$exist){
                $data = new Student_additional_data();
                $data->student_id = $additional_data['student_id'];
                $data->type_of_device = $additional_data['type_of_device'];
                $data->type_of_device_at_home = $additional_data['type_of_device_at_home'];
                $data->internet_at_home = $additional_data['internet_at_home'];
                $data->electricity_at_home = $additional_data['electricity_at_home'];
                $data->internet_device = $additional_data['internet_device'];
                $data->institution_id = $additional_data['institution_id'];
                $data->tv_at_home = $additional_data['tv_at_home'];
                $data->satellite_tv_at_home = $additional_data['satellite_tv_at_home'];
                $data->save();
                return $data;   
            }else{
                self::query()->where('student_id',$additional_data['student_id'])->update($additional_data);
                return $additional_data;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
