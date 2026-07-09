<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Client;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage clients');
    }

    public function index(): View
    {
        $clients = Client::orderBy('order')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('admin.clients.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:2048',
            'website_url' => 'nullable|url',
        ]);

        $logoPath = ImageService::uploadAndOptimize($request->file('logo'), 'clients');

        $client = Client::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'website_url' => $request->website_url,
            'order' => Client::count(),
        ]);

        ActivityLog::log('Created Client Logo', 'Created client logo entry: ' . $client->name);

        return redirect()->route('admin.clients.index')->with('success', 'Client logo added successfully.');
    }

    public function edit(Client $client): View
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'website_url' => 'nullable|url',
        ]);

        $logoPath = $client->logo;
        if ($request->hasFile('logo')) {
            $logoPath = ImageService::uploadAndOptimize($request->file('logo'), 'clients');
        }

        $client->update([
            'name' => $request->name,
            'logo' => $logoPath,
            'website_url' => $request->website_url,
        ]);

        ActivityLog::log('Updated Client Logo', 'Updated client logo entry: ' . $client->name);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client): RedirectResponse
    {
        ActivityLog::log('Deleted Client Logo', 'Deleted client logo entry: ' . $client->name);
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }

    public function reorder(Request $request): RedirectResponse
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Client::where('id', $id)->update(['order' => $index]);
        }

        ActivityLog::log('Reordered Client Logos', 'Reordered client logos sequence.');

        return redirect()->route('admin.clients.index')->with('success', 'Client logos reordered successfully.');
    }
}
