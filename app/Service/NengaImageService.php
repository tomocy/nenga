<?php

namespace App\Service;

use Image;

class NengaImageService {
    public function create($content, $author) {
        $base = Image::make(asset('img/nenga.png'));
        $base = $this->printContent($base, $content);
        $base = $this->printAuthor($base, $author);
        
        return $base;
    }

    private function printContent($base, $content) {
        $i = 0;
        $j = 0;
        foreach($this->splitJapanese($content) as $letter){
            $letter = $this->convertToBestLetterForVertical($letter);
            $x = 332 - (43 * $i);
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
        foreach($this->splitJapanese($author) as $letter){
            $letter = $this->convertToBestLetterForVertical($letter);
            $x = 41;
            $y = 644 + (38 * $i);
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
}
