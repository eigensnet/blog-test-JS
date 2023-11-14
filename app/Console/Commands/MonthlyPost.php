<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class MonthlyPost extends Command
{
    protected $signature = 'monthly:post';
    protected $description = 'Create a post on the first day of each month';

    public function handle()
    {
        if (Carbon::now()->day == 12) {
            $post = new Post([
                'title' => 'Zusammenfassung (' . Carbon::now()->format('m.Y') . ')',
                'body' => 'Wieder nix passiert. :(',
                'user_id' => 1,
                'category_id' => 1,
                'is_published' => false,
            ]);

            $post->save();
        }
    }
}
