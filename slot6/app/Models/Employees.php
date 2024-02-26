<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    // Khai báo các cột mà bạn muốn gán giá trị khi tạo hoặc cập nhật bản ghi
    protected $fillable = ['name', 'leave_days', 'work_days', 'rate'];

    // Khai báo một phương thức để tính điểm hiệu suất của nhân viên
    // Công thức là: (work_days * rate) + (12 - leave_days)
    public function getPerformanceScoreAttribute()
    {
        return ($this->work_days * $this->rate) + (12 - $this->leave_days);
    }
}
