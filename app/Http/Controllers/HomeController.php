<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Telegram\Bot;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private Bot $bot;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->bot = new Bot(env("TELEBOT"));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $words = Word::query()->paginate(20);
        return view('home', compact('words'));
    }

    public function add () {
        return view('add');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $word = new Word();
        $result = $word->fill([
            "word" => $request->input('word'),
            "end_des" => $request->input('en_des'),
            "vn_des" => $request->input('vn_des'),
            "date" => now()->toDate(),
            "count" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ])->save();

        return redirect()->route('home');
    }

    public function testBot () {
        $res = $this->bot->sendMessage('adfaf');

        dd($res->ok);
    }
}
