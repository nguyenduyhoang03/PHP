<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Phương thức để hiển thị danh sách nhân viên
    public function index()
    {
        // Lấy tất cả nhân viên từ cơ sở dữ liệu
        $employees = Employees::all();

        // Trả về một view có tên là employees.index và truyền biến employees vào view
        return view('employees.index', compact('employees'));
    }

    // Phương thức để hiển thị form tạo nhân viên mới
    public function create()
    {
        // Trả về một view có tên là employees.create
        return view('employees.create');
    }

    // Phương thức để lưu nhân viên mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Kiểm tra tính hợp lệ của dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string|max:255',
            'leave_days' => 'required|integer|min:0|max:12',
            'work_days' => 'required|integer|min:0|max:22',
            'rate' => 'required|numeric|min:0'
        ]);

        // Tạo nhân viên mới với dữ liệu nhập vào
        $employee = Employee::create($request->all());

        // Chuyển hướng đến trang danh sách nhân viên với thông báo thành công
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Phương thức để hiển thị chi tiết của một nhân viên
    public function show(Employee $employee)
    {
        // Trả về một view có tên là employees.show và truyền biến employee vào view
        return view('employees.show', compact('employee'));
    }

    // Phương thức để hiển thị form chỉnh sửa nhân viên
    public function edit(Employee $employee)
    {
        // Trả về một view có tên là employees.edit và truyền biến employee vào view
        return view('employees.edit', compact('employee'));
    }

    // Phương thức để cập nhật nhân viên vào cơ sở dữ liệu
    public function update(Request $request, Employee $employee)
    {
        // Kiểm tra tính hợp lệ của dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string|max:255',
            'leave_days' => 'required|integer|min:0|max:12',
            'work_days' => 'required|integer|min:0|max:22',
            'rate' => 'required|numeric|min:0'
        ]);

        // Cập nhật nhân viên với dữ liệu nhập vào
        $employee->update($request->all());

        // Chuyển hướng đến trang danh sách nhân viên với thông báo thành công
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }
}
    // Ph
