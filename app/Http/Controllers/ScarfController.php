<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use Illuminate\Http\Request;

class ScarfController extends Controller
{
    /**
     * Display a listing of scarves.
     */
    public function index()
    {
        $scarves = Scarf::all();
        return view('scarves.index', compact('scarves'));
    }

    /**
     * Show the form for creating a new scarf.
     */
    public function create()
    {
        return view('scarves.create');
    }

    /**
     * Store a newly created scarf in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'color' => 'required|string',
            'material' => 'required|string',
            'pattern' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('scarves', 'public');
            $validated['image'] = $path;
        }

        Scarf::create($validated);

        return redirect()->route('scarves.index')->with('success', 'Khăn đã được thêm thành công!');
    }

    /**
     * Display the specified scarf.
     */
    public function show(Scarf $scarf)
    {
        return view('scarves.show', compact('scarf'));
    }

    /**
     * Show the form for editing the specified scarf.
     */
    public function edit(Scarf $scarf)
    {
        return view('scarves.edit', compact('scarf'));
    }

    /**
     * Update the specified scarf in database.
     */
    public function update(Request $request, Scarf $scarf)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'color' => 'required|string',
            'material' => 'required|string',
            'pattern' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('scarves', 'public');
            $validated['image'] = $path;
        }

        $scarf->update($validated);

        return redirect()->route('scarves.show', $scarf)->with('success', 'Khăn đã được cập nhật!');
    }

    /**
     * Remove the specified scarf from database.
     */
    public function destroy(Scarf $scarf)
    {
        $scarf->delete();

        return redirect()->route('scarves.index')->with('success', 'Khăn đã được xóa!');
    }
}
