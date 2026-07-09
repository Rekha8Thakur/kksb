<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\Faq;
use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display Contact Page.
     */
    public function index(): View
    {
        $faqs = Faq::where('category', 'contact')->orderBy('order')->get();
        return view('contact', compact('faqs'));
    }

    /**
     * Store contact form inquiries.
     */
    public function submitEnquiry(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service_interest' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|min:10',
            'honeypot' => 'present|max:0', // Basic bot spam protection
        ]);

        ContactEnquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'service_interest' => $request->service_interest,
            'budget' => $request->budget,
            'message' => $request->message,
            'status' => 'unread',
        ]);

        return redirect()->back()->with('success', 'Your inquiry has been sent successfully. Our team will contact you within 24 hours!');
    }

    /**
     * Subscribe to newsletter.
     */
    public function subscribeNewsletter(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        Newsletter::updateOrCreate(
            ['email' => $request->email],
            ['status' => 'active']
        );

        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
