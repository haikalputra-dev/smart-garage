<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Garasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.index');
    }

    public function indexStaff()
    {
        // return view('admin.master_staff');
        $staffs = User::where('role', 'Staff')->get();
        return view('admin.master_staff', compact('staffs'));
    }

    public function indexGarasi()
    {
        // return view('admin.master_garasi');
        $garasis = Garasi::get();
        return view('admin.master_garasi', compact('garasis'));
    }

    public function transaksi()
    {
        return view('admin.transaksi');
    }

    public function riwayatTransaksi()
    {
        return view('admin.riwayat_transaksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
