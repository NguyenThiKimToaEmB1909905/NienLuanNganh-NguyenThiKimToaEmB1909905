<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;//  thường tạo bảng thì nó sẽ có 2 cột thời gian created_at	updated_at	thì mình sẽ cho nó bằng false để hk bị lỗi.

    protected $fillable = [// có thể làm đầy bảng(thêm tên cột ccủa bảng vào)
        'product_name','category_id','brand_id', 'product_desc',
         'product_content','product_price','product_status'// không thêm user_id vì nó là khóa tự tăng
    ];
    protected $primaryKey = 'product_id';// nếu không có trường này thì lấy id của trường)id)
    protected $table = 'tbl_product';// tên bảng
    public function category()
    {
        return $this->belongsTo('App\Models\CategoryProductModel','category_id');//
    }
}
