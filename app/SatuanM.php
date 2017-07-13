<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatuanM extends Model
{
    
    protected $table = 'tbl_satuan';

    protected $primaryKey = 'idsatuan';

    protected $fillable = ['satuan', 'keterangan', 'status'];
}
