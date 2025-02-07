<?php


function replaceAbsoluteUrlsWithRelative($content)
{
    $baseUrl = config('app.url');
    return preg_replace('/(href|src)=["\']' . preg_quote($baseUrl, '/') . '([^"\']+)["\']/', '$1="$2"', $content);
}

if (!function_exists('generateRandomDateInRange')) {
    function generateRandomDateInRange($startDate, $endDate)
    {
        $start = Carbon\Carbon::parse($startDate);
        $end   = Carbon\Carbon::parse($endDate);

        $difference = $end->timestamp - $start->timestamp;

        $randomSeconds = rand(0, $difference);

        return $start->copy()->addSeconds($randomSeconds);
    }
}
