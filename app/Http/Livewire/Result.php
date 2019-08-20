<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class Result extends Component
{
    public $isBot;

    public $query;

    protected $listeners = ['result' => 'checkBot'];

    public function checkBot($query)
    {
        $this->query = $query;

        if (empty($query)) {
            $this->isBot = null;
        } else {
            $this->isBot = (new CrawlerDetect)->isCrawler($query);
        }
    }

    public function render()
    {
        return view('livewire.result');
    }
}