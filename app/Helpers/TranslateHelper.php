<?php

namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateHelper
{
    public static function toArabic($text)
    {
        try {
            $tr = new GoogleTranslate('ar');
            return $tr->translate($text);
        } catch (\Exception $e) {
            return $text;
        }
    }
}