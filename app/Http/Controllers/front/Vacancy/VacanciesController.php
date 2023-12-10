<?php

namespace App\Http\Controllers\front\Vacancy;

use App\Http\Controllers\Controller;

class VacanciesController extends Controller
{
    public function __invoke()
    {
        return view('frontpage.vacancies.index');
    }
}
