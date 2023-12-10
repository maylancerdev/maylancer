<?php

use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\HtmlString;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

function current_user(): ? User
{
    return auth()->user();
}

function gravatar_img(string $name): HtmlString
{
    $gravatarId = md5(strtolower(trim($name)));

    return new HtmlString('<img src="https://gravatar.com/avatar/' . $gravatarId . '?s=240">');
}

function faker(): Generator
{
    return Factory::create();
}

function is_office_open(): bool
{
    if (! now()->isWeekday()) {
        return false;
    }

    $startTime = now()->hour(9)->minute(0);
    $endTime = now()->hour(17)->minute(30);

    return now()->between($startTime, $endTime);
}

function mailto(string $subject, string $body): string
{
    $subject = rawurlencode(htmlspecialchars_decode($subject));

    $body = rawurlencode(htmlspecialchars_decode($body));

    return "mailto:hello@maylancer.org?subject={$subject}&body={$body}";
}



function formatBytes($size, $precision = 2)
{
    $base = log((float) $size, 1024);
    $suffixes = ['', 'K', 'M', 'G', 'T'];

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}


function getDomain($url): bool|string
{
    $pieces = parse_url($url);
    $domain = $pieces['host'] ?? '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        return $regs['domain'];
    }
    return FALSE;
}


function replace_characters(string $text){

    return preg_replace(['/[^a-z0-9-\s]/i', '/\s+/'], ['', '-'], strtolower($text));


}
function generateBreadcrumbs($path)
{
    $folders = explode('/', $path);
    $result = [];

    $currentParent = &$result;
    $breadcrumbs = [];

    foreach ($folders as $folder) {
        $currentParent[] = ['title' => $folder, 'children' => []];
        $breadcrumbs[] = $folder;
        $currentParent = &$currentParent[count($currentParent) - 1]['children'];
    }

    return $breadcrumbs;
}


function checkIfContainsRoute(Request $request)
{
    return Str::startsWith($request->path(), ['docs/', 'blog/']);
}




