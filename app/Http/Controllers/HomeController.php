<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use App\Models\Customer;
use DB;
use Reflector;

class HomeController extends Controller
{
    public function home()
    {
        $customers = Customer::select('name', 'code', 'address')->get();
        $data = [
            'customers' => $customers
        ];

        return view('pages.home', $data);
    }

    public function importForm()
    {
        return view('pages.import');
    }

    public function import(Request $request)
    {
        $this->validate($request,
            [
                'file' => 'required|mimes:xlsx'
            ],[
                'file.mimes' => 'File phải là Excel',
                'file.required' => 'Cần chọn file import'
            ]
        );
        try {
            DB::beginTransaction();
            if (!empty($request->remove)) {
                Customer::where('id', '>', 0)->delete();
            }
            Excel::import(new CustomerImport(), $request->file('file'));
            DB::commit();

            return redirect()->route('home');
        } catch (\Throwable $th) {
            DB::rollback();

            return back()->with('error', 'Vui lòng thử lại');
        }
    }

    public function background(Request $request)
    {
        $this->validate($request,
            [
                'background' => 'required|mimes:jpg'
            ],[
                'background.mimes' => 'Ảnh phải định dạng jpg',
                'background.required' => 'Ảnh là bắt buộc'
            ]
        );
        $inputs = $request->except('_token');
        $inputs['background']->move(public_path('/'), 'bg.jpg');

        return redirect()->route('home');
    }
}
