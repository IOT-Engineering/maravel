<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounting_invoice_lines';
    
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
    protected $fillable = ['invoice_id', 'name', 'description', 'quantity', 'price', 'tax'];
    
    
    
    public function invoice()
    {
        return $this->belongsTo('Modules\Accounting\Entities\Invoice');
    }
}
