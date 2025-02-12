<?php
class watchlist extends Controller
{

    private $watchlsit;

    public function __construct()
    {
        $this->watchlsit->model('watchlist');
    }

    public function showcryptowatchlist()
    {

        $this->view('home/watchlist');
    }
}
