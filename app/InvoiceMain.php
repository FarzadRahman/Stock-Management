<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceMain extends Model
{
    protected $table='invoice_main';
    protected $primaryKey='invoice_mainId';
    public $timestamps=false;
}
