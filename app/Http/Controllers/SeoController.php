<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SeoController extends Controller
{
    public function robots(): Response
    {
        $content = Cache::remember('seo:robots', now()->addHours(6), function () {
            $sitemapUrl = url('/sitemap.xml');

            return implode("\n", [
                'User-agent: *',
                'Allow: /',
                '',
                "Sitemap: {$sitemapUrl}",
                '',
            ]);
        });

        return response($content, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function sitemap(): Response
    {
        $xml = Cache::remember('seo:sitemap', now()->addHours(6), function () {
            $urls = [
                url('/'),
                url('/projects'),
                url('/contact'),
            ];

            $lastmod = now()->toAtomString();

            $items = collect($urls)->map(function (string $loc) use ($lastmod) {
                $escaped = e($loc);

                return implode('', [
                    '<url>',
                    "<loc>{$escaped}</loc>",
                    "<lastmod>{$lastmod}</lastmod>",
                    '<changefreq>weekly</changefreq>',
                    '<priority>0.8</priority>',
                    '</url>',
                ]);
            })->implode('');

            return implode('', [
                '<?xml version="1.0" encoding="UTF-8"?>',
                '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
                $items,
                '</urlset>',
            ]);
        });

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}

