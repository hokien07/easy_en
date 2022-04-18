<?php

namespace App\Console\Commands;

use App\Models\Word;
use App\Telegram\Bot;
use Illuminate\Console\Command;

class EasyEnglishCommand extends Command
{
    private Bot $bot;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'easy:bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a word to telegram bot';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->bot = new Bot(env("TELEBOT"));
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $word = Word::query()->whereDate('date', now()->toDate())->inRandomOrder()->first();
        if($word){
            $result = $this->bot->sendMessage($word->word);
            if($result->ok) {
                $word->fill([
                    'count' => (int)$word->count + 1,
                    'updated_at' => now()
                ])->save();
            }
        }
    }
}
