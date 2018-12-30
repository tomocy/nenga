<?php

namespace App\Service;

use Image;
use Storage;

class NengaImageService {
    public function create($content, $author) {
        $image = $this->make($content, $author);
        
        return $this->saveImage($image);        
    }

    public function createForOGP($content, $author) {
        $image = $this->make($content, $author);
        $image->resizeCanvas(1200, 630, 'center');
        return $image;
    }

    private function make($content, $author) {
        $base = Image::make(asset('img/nenga.png'));
        $base = $this->printContent($base, $content);
        $base = $this->printAuthor($base, $author);
        return $base;
    }

    private function printContent($base, $content) {
        $i = 0;
        $j = 0;
        $letters = $this->splitJapanese($content);
        $count = count($letters);
        $lamda = $count/10;
        if ($count === 10 || $count === 20 || $count === 30 || $count === 40 || $count === 50) {
            $lamda--;
        }
        $baseX = 332;
        if (2 <= $lamda) {
            $baseX += (20 * ($lamda - 1));
        }
        foreach($letters as $letter){
            $letter = $this->convertToBestLetterForVertical($letter);
            $x = $baseX - (43 * $i);
            $y = 161 + (38 * $j);
            $base->text($letter, $x, $y, function($font) {
                $font->file(public_path('font/HiraginoW6.ttc'));
                $font->size(25);
            });
            $j++;
            if (10 <= $j) {
                $j = 0;
                $i++;
            }
        }

        return $base;
    }

    private function printAuthor($base, $author) {
        $i = 0;
        $letters = $this->splitJapanese($author);
        $baseY = 644;
        if (6 <= count($letters)) {
            $baseY = 644 - (25 * (count($letters) - 5));
        }
        foreach($letters as $letter){
            $letter = $this->convertToBestLetterForVertical($letter);
            $x = 41;
            $y = $baseY + (38 * $i);
            $base->text($letter, $x, $y, function($font) {
                $font->file(public_path('font/HiraginoW6.ttc'));
                $font->size(25);
            });
            $i++;
        }

        return $base;
    }

    private function splitJapanese($text) {
        return preg_split("//u", $text, -1, PREG_SPLIT_NO_EMPTY);
    }

    private function convertToBestLetterForVertical($letter) {
        if ($letter === "ー") {
            return "｜";
        }

        return $letter;
    }

    private function saveImage($image) {
        $path = storage_path('app/public/nenga/').uniqid().'.png';
        $image->save($path);
        $path = str_replace(storage_path('app/public/'), "storage/", $path);
        if (substr($path, 0, 1) !== '/') {
            $path = '/'.$path;
        }
        return $path;
    }
}
