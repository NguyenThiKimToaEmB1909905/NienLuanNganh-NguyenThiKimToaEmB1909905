<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    public $timestamps = false;//  thường tạo bảng thì nó sẽ có 2 cột thời gian created_at	updated_at	thì mình sẽ cho nó bằng false để hk bị lỗi.

    protected $fillable = [// có thể làm đầy bảng(thêm tên cột ccủa bảng vào)
        // 'meta_keywords',
        'category_name','category_desc','category_status'
    ];
    protected $primaryKey = 'product_id';// nếu không có trường này thì lấy id của trường)id)
    protected $table = 'tbl_category_product';// tên bảng
    public function product()
    {
        return $this->hasMany('App\Models\Product');//
    }
}
