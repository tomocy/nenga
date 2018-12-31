<?php

namespace App\Http\Controllers;

use App\Nenga;
use App\Service\NengaImageService;
use App\Http\Requests\StoreNengaRequest as Request;
use Storage;

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
            'image_path' => $path->normal,
            'ogp_image_path' => $path->ogp,
        ]);

        return redirect()->route('nenga.show', $nenga->id);
    }

    public function show(Nenga $nenga) {
        return view('nenga.show', [
            'nenga' => $nenga,
            'imageURL' => Storage::disk('s3')->url($nenga->image_path),
            'imageOGPURL' => Storage::disk('s3')->url($nenga->ogp_image_path),
        ]);
    }
}
