<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
{
    $categories = ['Marketing', 'Finance', 'HPP', 'Operations', 'Menu Development', 'Customer Service'];

    $consultations = Consultation::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('consultation', compact('categories', 'consultations'));
}

public function store(Request $request)
{
    $request->validate([
        'category' => 'required|string|max:100',
        'message' => 'required|string',
        'attachment' => 'nullable|file|max:2048',
    ]);

    $attachmentPath = null;
    if ($request->hasFile('attachment')) {
        $attachmentPath = $request->file('attachment')->store('consultations', 'public');
    }

    $consultation = Consultation::create([
        'user_id'   => auth()->id(),
        'category'  => $request->category,
        'message'   => $request->message,
        'attachment'=> $attachmentPath,
        'answer'    => "Halo, terima kasih sudah mencoba fitur layanan konsultasi kami. Saat ini, kami sedang dalam tahap pengembangan untuk menyempurnakan fitur ini agar dapat memberikan pengalaman yang lebih baik, cepat, dan sesuai dengan kebutuhan Anda.\n\nKami sangat menghargai setiap masukan dan saran dari Anda, karena hal tersebut akan membantu kami meningkatkan kualitas layanan. Nantikan pembaruan berikutnya, dan semoga fitur ini bisa menjadi solusi praktis yang bermanfaat bagi Anda.",
        'status'    => 'Answered',
    ]);

    return redirect()->route('consultations.index')->with('success', 'Pertanyaan berhasil dikirim!');
}

public function show($id)
{
    $question = Consultation::findOrFail($id);

    return view('consultation-detail', compact('question'));
}

}
