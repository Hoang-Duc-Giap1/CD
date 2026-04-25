<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use Illuminate\Http\Request;

class BagController extends Controller
{
    /**
     * Display a listing of bags.
     */
    public function index()
    {
        $bags = Bag::all();
        return view('bags.index', compact('bags'));
    }

    /**
     * Show the form for creating a new bag.
     */
    public function create()
    {
        return view('bags.create');
    }

    /**
     * Store a newly created bag in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'color' => 'required|string',
            'material' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('bags', 'public');
            $validated['image'] = $path;
        }

        Bag::create($validated);

        return redirect()->route('bags.index')->with('success', 'Túi xách đã được thêm thành công!');
    }

    /**
     * Display the specified bag.
     */
    public function show(Bag $bag)
    {
        return view('bags.show', compact('bag'));
    }

    /**
     * Show the form for editing the specified bag.
     */
    public function edit(Bag $bag)
    {
        return view('bags.edit', compact('bag'));
    }

    /**
     * Update the specified bag in database.
     */
    public function update(Request $request, Bag $bag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'color' => 'required|string',
            'material' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('bags', 'public');
            $validated['image'] = $path;
        }

        $bag->update($validated);

        return redirect()->route('bags.show', $bag)->with('success', 'Túi xách đã được cập nhật!');
    }

    /**
     * Remove the specified bag from database.
     */
    public function destroy(Bag $bag)
    {
        $bag->delete();

        return redirect()->route('bags.index')->with('success', 'Túi xách đã được xóa!');
    }
}
