<?php

namespace App\Livewire\Newsletter;

use App\Services\Newsletter;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Subscribe extends Component
{

    #[Validate('required|email')]
    public $email ='';
    public $isSubscribed = false;

    public function render()
    {
        return view('frontpage.newsletter.subscribe');
    }

    public function subscribe(Newsletter $newsletter){

        $this->validate();
        try{
            $newsletter->subscribe($this->email);
        }catch (\Exception $e){
            $this->addError('email', 'This email could not be added to our newsletter list.');
            return;
        }

        $this->resetForm();
        $this->isSubscribed = true;
    }

    private function resetForm(): void
    {
        $this->reset(['email']);
    }

}
