<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $terms = TermsAndConditions::first();
        return view('admin.terms-and-conditions.create', compact('terms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        TermsAndConditions::create([
            'description' => $request->description,
        ]);

        return redirect()->route('terms.index')->with('success', 'تم إضافة الشروط والأحكام بنجاح');
    }

    public function update(Request $request, TermsAndConditions $terms)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $terms->update([
            'description' => $request->description,
        ]);

        return redirect()->route('terms.index')->with('success', 'تم تحديث الشروط والأحكام بنجاح');
    }
}
