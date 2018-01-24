<?php

namespace App\Services;

class SvgSprite {

    public static function make($directory, $prefix = '') {

        $directory .= '/*.svg';
        $symbols = [];

        foreach (array_merge(glob($directory)) as $path):
            array_push($symbols, self::toSymbol($path, $prefix));
        endforeach;

        return self::wrap($symbols);

    }

    public static function single($path, $id = null) {
        return self::wrap(self::toSymbol($path, '', $id));
    }

    private static function toSymbol($path, $prefix = '', $id = null) {
        // File parts
        $path_info = pathinfo($path);
        $id = $id ?: $prefix . $path_info['filename'];

        $content = file_get_contents($path);

        // Strip Styles
        $content = preg_replace('/<style.+<\/style>/is', '', $content);

        // Get the SVG open tag
        preg_match('/<svg.+>/i', $content, $svg_open);

        // Strip out unwanted attributes
        $new_svg_tag = preg_replace('/ (id|width|height|data-name|xmlns)=".*?"/is', '', $svg_open[0]);

        // Add id attribute
        $new_svg_tag = preg_replace('/<svg (.*)<\/svg>/is', '<symbol id="' . $id . '" $1</symbol>', $new_svg_tag);

        // Replace SVG open tag
        $content = preg_replace('/<svg.+>/i', $new_svg_tag, $content);

        // Replace svg tag with symbol tag, adding the id attribute based on the file name
        $content = preg_replace('/<svg (.*)<\/svg>/is', '<symbol id="' . $id . '" $1</symbol>', $content);

        // Replace any unwanted attributes
        $content = preg_replace('/ data-name=".*?"/is', '', $content);
        $content = preg_replace('/ xmlns=".*?"/is', '', $content);

        // Replace fill attributes
        // https://tomhazledine.com/inline-svg-icons/
        $content = preg_replace('/fill=("|\')(#)?([a-fA-F0-9]*)("|\')/i', '', $content);

        // Remove whitespace
        $content = preg_replace('~>\s+<~', '><', $content);

        return $content;

    }

    private static function wrap($symbols) {
        return '<svg xmlns="http://www.w3.org/2000/svg" style="display:none;"><defs>' . (is_array($symbols) ? implode('', $symbols) : $symbols) . '</defs></svg>';
    }

}