<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispatcher;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index()
    {
        $data = Dispatcher::all();

        return view('admin.sample.index', compact('data'));
    }

    public function create()
    {
        return view('admin.sample.form');
    }

    public function store(Request $request){
        
        $request->validate([
        'fname' => 'required',
        'mname' => 'required', 
        'lname' => 'required',
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'email' => 'required|email|unique:dispatchers,email',
        'password' => 'required|min:8',
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($request['password']);
        $data['terminal_id'] = 1; // Set the terminal_id to 1 for all dispatchers
        $dispatcher = Dispatcher::create($data);

        return redirect()->route('admin.get-dispatchers')->with('success', 'Dispatcher created successfully.');
    }

    public function edit($id)
    {
        try {
            $dispatcher = Dispatcher::FindOrFail($id);
            return view('admin.sample.form', compact('dispatcher'));
        } catch (\Exception $e) {
            \Log::error('Error finding dispatcher with ID: ' . $id . '. Error: ' . $e->getMessage());
            return redirect()->route('admin.get-dispatchers')->with('error', 'Dispatcher not found.');
        }
    }

    public function update($id, Request $request)
    {
        $dispatcher = Dispatcher::FindOrFail($id);

        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:dispatchers,email,' . $id,
            'password' => 'nullable|min:8',
        ]);

        $data = $request->all();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $dispatcher->update($data);

        return redirect()->route('admin.get-dispatchers')->with('success', 'Dispatcher updated successfully.');
    }

    public function delete($id)
    {
        try {
            $dispatcher = Dispatcher::FindOrFail($id);
            $dispatcher->delete();
            return redirect()->route('admin.get-dispatchers')->with('success', 'Dispatcher deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting dispatcher with ID: ' . $id . '. Error: ' . $e->getMessage());
            return redirect()->route('admin.get-dispatchers')->with('error', 'Error deleting dispatcher.');
        }
    }

}
