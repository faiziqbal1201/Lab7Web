<?php

namespace App\Cells;
use CodeIgniter\View\Cell;
use App\Models\ArtikelModel;
use CodeIgniter\Cache\CacheInterface;
use Config\Services;

class ArtikelTerkini extends Cell
{
    public function __construct()
    {
        parent::__construct(Services::cache()); // Memanggil constructor parent dengan cache
    }

    public function render(string $library = '', $params = null, int $ttl = 0, ?string $cacheName = null): string
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();
        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
