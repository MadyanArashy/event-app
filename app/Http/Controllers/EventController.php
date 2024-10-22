<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $events = Event::all();
        return view('dashboard', compact('events'));
    }

    public function index()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
            'desc' => 'required|string',
        ]);

        $image = $request->file('image')->store('events', 'public');

        Event::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'date' => $request->date,
            'image' => $image,
            'location' => $request->location,
        ]);

        return redirect('events');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        return view('show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse {
        // Validate form
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'image' => 'image|mimes:jpeg,jpg,png,svg,webp|max:2048',
            'desc' => 'required|string',
        ]);

        // Get product dengan ID
        $event = event::findOrFail($id);

        // Check jika ada image
        if ($request->hasFile('image')) {

        // Upload image baru
        $image = $request->file('image')->store('events', 'public');

        // Hapus image lama
        Storage::delete('public/events/'.$request->image);

        //update product with new image
        $event->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'date' => $request->date,
            'image' => $image,
            'location' => $request->location,
        ]);
        }
        else {
            // Update tanpa image
            $event->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'date' => $request->date,
                'location' => $request->location,
            ]);
        }

        return redirect()->to($_SERVER['HTTP_REFERER'])->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
