<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.items_list', [
            'items' => Items::with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.item_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:13'],
            'description' => [],
            'year' => []
        ]);
        $validate['exists'] = true;
        $name = $request->get('name');
        $description = $request->get('description');
        $year = $request->get('year');
        $exists = true;

        auth()->user()->items()->create($validate
            /*[
            'name' => $name,
            'description' => $description,
            'year' => $year,
            'exists'=>$exists,
        */);

        session()->flash('status', 'Created!');

        return to_route('items.list');
    }

    /**
     * Display the specified resource.
     */
    public function show($items)
    {
        $item = Items::findOrFail($items);
        return view('items.item_view', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($items)
    {
        $item = Items::findOrFail($items);
        $this->authorize('update', $item);
        return view('items.item_edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $items)
    {
        $item = Items::findOrFail($items);
        $this->authorize('update', $item);
        
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:13'],
            'description' => [],
            'year' => []
        ]);
        $validate['exists'] = true;
        
        session()->flash('status', 'Updated!');
        $item->update($validate);

        return to_route('items.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($items)
    {
        $item = Items::findOrFail($items);
        $this->authorize('delete', $item);
        $item->delete();
        return to_route('items.list')->with('status', 'Deleted!');
    }
}
