<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;//  thường tạo bảng thì nó sẽ có 2 cột thời gian created_at	updated_at	thì mình sẽ cho nó bằng false để hk bị lỗi.

    protected $fillable = [// có thể làm đầy bảng(thêm tên cột ccủa bảng vào)
        'provider_user_id','provider_user_email', 'provider', 'user'// không thêm user_id vì nó là khóa tự tăng
    ];
    protected $primaryKey = 'user_id';// nếu không có trường này thì lấy id của trường)id)
    protected $table = 'tbl_social';// tên bảng
    public function Login()
    {
        return $this->belongsTo('App\Models\Login','user');//
    }
}
