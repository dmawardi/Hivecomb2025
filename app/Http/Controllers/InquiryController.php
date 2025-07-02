<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        // Grab search query if it exists
        $search = $request->input('search');
        if ($search) {
            // Filter inquiries based on search query
            $inquiries = Inquiry::where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%")
                ->orderByRaw("CASE WHEN status = 'unread' THEN 0 ELSE 1 END")
                ->orderBy('created_at', 'desc')
                ->paginate();
        } else {
            // Default to all inquiries
            $inquiries = Inquiry::orderByRaw("CASE WHEN status = 'unread' THEN 0 ELSE 1 END")
                ->orderBy('created_at', 'desc')
                ->paginate();
        }

        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        return view('inquiries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'type' => 'required|in:general,quote,support,partnership',
            'message' => 'required|string',
        ]);
        
        // Set the status to unread
        $request->merge(['status' => 'unread']);
        // Create a new inquiry
        $inquiry = Inquiry::create($request->all());

        // Send an email
        // Mail::to(env('ADMIN_EMAIL'))->queue(new InquiryReceived($inquiry));

        return redirect()->route('inquiries.create')->with('success', 'Your message has been sent successfully!');
    }

    public function show(Inquiry $inquiry)
    {
        $inquiry->status = 'read'; // Mark as read
        $inquiry->save();
        return view('inquiries.show', compact('inquiry'));
    }

    public function edit(Inquiry $inquiry)
    {
        return view('inquiries.edit', compact('inquiry'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'phone' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'type' => 'sometimes|required|in:general,quote,support,partnership',
            'message' => 'sometimes|required|string',
            'status' => 'sometimes|in:unread,read,archived,in progress,resolved,closed',
        ]);
        $inquiry->update($request->all());

        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated successfully!');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted successfully!');
    }
}
