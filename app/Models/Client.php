<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'client_name', 'client_email', 'client_password','client_sdt','client_picture'
    ];
    protected $primaryKey = 'client_id';
 	protected $table = 'tbl_clients';
}
