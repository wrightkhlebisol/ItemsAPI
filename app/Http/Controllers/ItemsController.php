<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        //
        $allItems = Items::all();

        foreach ($allItems as $item) {
            $item->in = unserialize($item->in);
            $item->out = unserialize($item->out);
        }
        return response()->json($allItems, 200);
    }

    public function createItem(Request $request)
    {
        $items = Items::updateOrCreate(['id' => 1], [
            'in' => serialize($request->in),
            'out' => serialize($request->out)
        ]);

        return response()->json($items, 200);
    }
}
