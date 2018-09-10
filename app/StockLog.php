<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    protected $table='stock_log';
    protected $primaryKey='stock_logId';
    public $timestamps=false;
}
