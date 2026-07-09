<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display services listing page.
     */
    public function index(): View
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        return view('services.index', compact('services'));
    }

    /**
     * Display a single service details page.
     */
    public function show(string $slug): View
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $faqs = Faq::where('category', 'services')->orderBy('order')->get();
        $otherServices = Service::where('slug', '!=', $slug)->where('is_active', true)->take(3)->get();

        return view('services.show', compact('service', 'faqs', 'otherServices'));
    }
}
