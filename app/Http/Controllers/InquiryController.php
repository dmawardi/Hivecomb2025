<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::orderByRaw("CASE WHEN status = 'unread' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        // Logic to show the contact form
        return view('inquiries.create');
    }

    public function store(Request $request)
    {
        // Logic to handle the contact form submission
        // Validate and save the inquiry
        return redirect()->route('inquiries.create')->with('success', 'Your message has been sent successfully!');
    }

    public function show(Inquiry $inquiry)
    {
        $inquiry->status = 'read'; // Mark as read
        $inquiry->save();
        return view('inquiries.show', compact('inquiry'));
    }

    public function edit($id)
    {
        // Logic to show the edit form for an inquiry
        return view('inquiries.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update an inquiry
        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated successfully!');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted successfully!');
    }
}
