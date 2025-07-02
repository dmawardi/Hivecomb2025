<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        // Logic to list inquiries
        return view('inquiries.index');
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

    public function show($id)
    {
        // Logic to show a specific inquiry
        return view('inquiries.show', compact('id'));
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

    public function destroy($id)
    {
        // Logic to delete an inquiry
        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted successfully!');
    }
}
