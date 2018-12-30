<?php

namespace App\Http\Controllers;

use App\Nenga;
use App\Service\NengaImageService;
use App\Http\Requests\StoreNengaRequest as Request;

class NengaController extends Controller
{
    private $nengaImageService;

    public function __construct(NengaImageService $nengaImageService) {
        $this->nengaImageService = $nengaImageService;
    }

    public function new() {
        return view('nenga.new');
    }

    public function create(Request $request) {
        $path = $this->nengaImageService->create($request->content, $request->author);
        $nenga = Nenga::create([
            'content' => $request->content,
            'author' => $request->author,
            'image_path' => $path,
        ]);
    }
}
