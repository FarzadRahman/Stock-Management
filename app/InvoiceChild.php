<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceChild extends Model
{
    protected $table='invoice_child';
    protected $primaryKey='invoice_childId';
    public $timestamps=false;
}
