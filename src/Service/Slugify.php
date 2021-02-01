<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input) : string
    {
        $accentedCharacters = [
            'é|É' => 'e', 'è|È' => 'e', 'ê|Ê' => 'e',
            'ë|Ë' => 'e', 'ç|Ç' => 'c', 'à|À' => 'a',
            'â|Â' => 'a', 'ä|Ä' => 'a', 'ŷ|Ŷ' => 'y',
            'ÿ|Ÿ' => 'y', 'ù|Ù' => 'u', 'û|Û' => 'u',
            'ü|Ü' => 'u', 'î|Î' => 'i', 'ï|Ï' => 'i',
            'ô|Ô' => 'o', 'ö|Ö' => 'o',
        ];

        foreach ($accentedCharacters as $key => $value) {
            $input = preg_replace('#' . $key . '#i', $value, $input);
        }

        $input = preg_replace('#\W#', ' ', $input);
        $input = trim($input);
        $listCharacters = explode(' ', $input);
        $listCharactersLen = count($listCharacters);
        $newListCharacters = [];

        for ($i = 0; $i < $listCharactersLen; $i++) {
            if ($listCharacters[$i] != '') {
                $newListCharacters[] = $listCharacters[$i];
            }
        }

        $input = implode('-', $newListCharacters);

        return strtolower($input);
    }
}
