<?php

declare(strict_types = 1);

namespace ColognePhonetic;

/**
 * Class ColognePhonetic
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package ColognePhonetic
 */
class ColognePhonetic
{
    /**
     * @param string $word
     * @return string|null
     */
    public function convert(string $word): ?string
    {
        $word = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $word);
        $word = strtolower($word);
        $word = preg_replace('/[^a-z]+/', '', $word);

        if (empty($word))
        {
            return null;
        }

        $lookup = [
            'a' => '0', 'e' => '0', 'i' => '0', 'j' => '0', 'o' => '0', 'u' => '0', 'y' => '0',
            'f' => '3', 'v' => '3', 'w' => '3',
            'g' => '4', 'k' => '4', 'q' => '4',
            'l' => '5',
            'm' => '6', 'n' => '6',
            'r' => '7',
            's' => '8', 'z' => '8',
        ];

        $i = 0;

        $code = '';

        if('c' == $word[0])
        {
            switch ($word[1] ?? null)
            {
                case null:
                case 'a':
                case 'h':
                case 'k':
                case 'l':
                case 'o':
                case 'q':
                case 'r':
                case 'u':
                case 'x':
                    $code .= '4';
                    break;
                default:
                    $code .= '8';
            }

            $i = 1;
        }

        for (; isset($word[$i]); $i++)
        {
            $prev = $word[$i - 1] ?? null;
            $next = $word[$i + 1] ?? null;

            switch($word[$i])
            {
                case 'h':
                    continue;
                case 'b':
                case 'p':
                    if ('p' == $word[$i] && 'h' == $next)
                    {
                        $code .= '3';
                    }
                    else
                    {
                        $code .= '1';
                    }
                    continue;
                case 'd':
                case 't':
                    switch ($next)
                    {
                        case 'c':
                        case 's':
                        case 'z':
                            $code .= '8';
                            continue;
                        default:
                            $code .= '2';
                    }
                    continue;
                case 'c':
                    switch ($next)
                    {
                        case 'a':
                        case 'h':
                        case 'k':
                        case 'o':
                        case 'q':
                        case 'u':
                        case 'x':
                            switch ($prev)
                            {
                                case 's':
                                case 'z':
                                    $code .= '8';
                                    continue;
                                default:
                                    $code .= '4';
                            }
                            continue;
                        default:
                            $code .= '8';
                    }
                    continue;
                case 'x':
                    switch ($prev)
                    {
                        case 'c':
                        case 'k':
                        case 'q':
                            $code .= '8';
                            continue;
                        default:
                            $code .= '48';
                    }
                    continue;
                default:
                    if ($lookup[ $word[$i] ] != '0' || $i == 0)
                    {
                        $code .= $lookup[ $word[$i] ];
                    }
            }
        }

        return preg_replace('/(.)\1+/', '\1', $code);
    }
}