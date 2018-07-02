<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vendor','module', 'key', 'value','user_id'];
    
    public static function getKeyArrayForModule($vendor, $moduleName, $user_id=null)
    {
        $query = Config::where('vendor', 'maravel')->where('module',$vendor);
        
        if($user_id == null)
        {
            $query->whereNull('user_id');
        }
        else
        {
            $query->where('user_id', $user_id);
        }
        
        $query = $query->get();
    
        $config = [];
        foreach ($query as $item)
        {
            $config[$item['key']] = $item['value']; 
        }        
        
        return $config;
    }
    
    
}
