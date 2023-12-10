<?php

namespace App\Livewire\Contact;

use App\Mail\ContactFormSubmitted;
use App\Settings\ContactSettings;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{

    public $display_contact_form = true;
    public $company_name;
    public $first_name;
    public $last_name;
    public $email;
    public $how_can_we_help;
    public $tell_us_more;
    public $budget;
    public $how_did_you_hear_about_us;

    protected $rules = [
        'company_name' => '',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'how_can_we_help' => 'required',
        'tell_us_more' => 'required',
        'budget' => 'required',
        'how_did_you_hear_about_us' => 'required',
    ];

    public function render()
    {
        return view('frontpage.contact.livewire.form');
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        // Send email with form data
        Mail::to(app(ContactSettings::class)->contact_email_address)->send(new ContactFormSubmitted($validatedData));

        $this->resetForm();
        $this->display_contact_form = false;


    }


    private function resetForm()
    {
        $this->company_name = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->how_can_we_help = '';
        $this->tell_us_more = '';
        $this->budget = '';
        $this->how_did_you_hear_about_us = '';
        $this->hydrate();
        $this->resetValidation('email');


    }




    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }



}
