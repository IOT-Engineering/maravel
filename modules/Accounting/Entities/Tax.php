<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounting_iva';
    
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
    protected $fillable = ['value'];
    
}
