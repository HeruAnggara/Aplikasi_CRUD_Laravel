<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        //get employees
        $keyword = $request->keyword;
        $employees = Employee::where('id_karyawan', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('nama_karyawan', 'LIKE', '%'.$keyword.'%')    
                    ->paginate(10);

        //render view with employees
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_karyawan'     => 'required|min:5',
            'nama_karyawan'     => 'required',
            'alamat'   => 'required',
            'email'   => 'required',
            'no_telp'   => 'required|min:12|max:15',
            'gaji'   => 'required|numeric',
        ]);

        //create employee
        Employee::create($request->post());

        //redirect to index
        return redirect()->route('employees.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }
    
    public function update(Request $request, Employee $employee)
    {
       //validate form
       $this->validate($request, [
        'id_karyawan'     => 'required|min:5',
        'nama_karyawan'     => 'required',
        'alamat'   => 'required',
        'email'   => 'required',
        'no_telp'   => 'required|min:12|max:15',
        'gaji'   => 'required|numeric',
    ]);
    
    $employee->fill($request->post())->save();

        //redirect to index
        return redirect()->route('employees.index')->with(['success' => 'Data Karyawan Berhasil Diupdate!']);
    }

    public function destroy(Employee $employee)
    {
        //delete post
        $employee->delete();

        //redirect to index
        return redirect()->route('employees.index')->with(['success' => 'Data Karyawan Berhasil Dihapus!']);
    }
}
