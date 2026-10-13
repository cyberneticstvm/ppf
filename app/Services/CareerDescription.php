<?php

namespace App\Services;

use HTMLPurifier;
use HTMLPurifier_Config;

class CareerDescription
{
    public function clean(string $html): string
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Cache.DefinitionImpl', null);
        $config->set('HTML.Allowed', 'p[style],div[style],span[style],br,strong,b,em,i,u,s,ul,ol,li,h2,h3,h4,blockquote,a[href|title],table,thead,tbody,tr,th,td');
        $config->set('CSS.AllowedProperties', ['color', 'background-color', 'font-size', 'font-weight', 'font-style', 'text-align', 'text-decoration', 'margin-left']);
        $config->set('URI.AllowedSchemes', ['http' => true, 'https' => true, 'mailto' => true, 'tel' => true]);

        return (new HTMLPurifier($config))->purify($html);
    }

    public function hasText(?string $html): bool
    {
        $text = html_entity_decode(strip_tags($html ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return preg_replace('/[\s\x{00a0}\x{200b}]+/u', '', $text) !== '';
    }
}
