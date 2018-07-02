<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounting_invoices';

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
    protected $fillable = ['invoice_number', 'company_name', 'company_nif', 'company_address', 'client_name',
        'client_nif', 'client_country', 'client_city', 'client_cp', 'client_address', 'date', 'due_date', 'draft',
        'send','paid_percent', 'category_id'];
}
