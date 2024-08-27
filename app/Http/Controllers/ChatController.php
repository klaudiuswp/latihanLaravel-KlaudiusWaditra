<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreChatsRequest;
use App\Models\Chats;

class ChatController extends Controller
{
    protected $geminiservice;

    // public function __construct(GeminiService $geminiservice)
    // {
    //     $this->$geminiservice = $geminiservice;
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chats::all();
        return view('chat', ['chats' => $chats]);
    }

    public function store(StoreChatsRequest $request)
    {
        $input = $request->input('message');
        $url = env('GEMINI_API_BASE_URL') . "?key=" . env('GEMINI_API_KEY');

        $payload = [
            "contents" => [
                "role" => "user",
                "parts" => [
                    "text" => $input
                ]
            ],
            "systemInstruction" => [
                "role" => "user",
                "parts" => [
                    [
                        "text" => "Anda adalah seorang guru matematika untuk sekolah dasar"
                    ]
                ]
            ],
            "generationConfig" => [
                "temperature" => 1,
                "topK" => 64,
                "topP" => 0.95,
                "maxOutputTokens" => 8192,
                "responseMimeType" => "text/plain"
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        $geminiRespones = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'no respones';
        $chat = new Chats();
        $chat->send_chat = $input;
        $chat->get_chat = $geminiRespones;
        $chat->save();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
