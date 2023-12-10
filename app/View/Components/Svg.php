<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\File;



class Svg extends Component
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function content(): string
    {
        $path = resource_path("icons/{$this->name}.svg");

        if (!File::exists($path)) {
            return '';
        }

        return File::get($path);
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.svg', [
            'svgContent' => $this->content()
        ]);
    }




}
