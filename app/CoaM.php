<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaM extends Model
{
    
    protected $table = 'tbl_coa';

    protected $primaryKey = 'idcoa';

    protected $fillable = ['parent', 'kode', 'nama', 'tipe', 'status'];
}
