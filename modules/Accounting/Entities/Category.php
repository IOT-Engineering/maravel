<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounting_categories';
    
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
    protected $fillable = ['name', 'color'];
    
    public function invoice()
    {
        return $this->hasMany('Modules\Accounting\Entities\Invoice');
    }
}
