<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Contato";
    public $comp = 'contact';
    public Contact $contact;

    protected function rules()
    {
        return [
            'contact.email' => 'required',
            'contact.email_press' => 'required',
            'contact.phone_press' => 'required',
        ];
    }

    protected $validationAttributes = [
        'contact.email' => 'email',
        'contact.email_press' => 'email acessoria de imprensa',
        'contact.phone_press' => 'email acessoria de imprensa',
    ];

    public function mount()
    {
        $this->contact = Contact::find(1);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->contact->update($this->contact->toArray());
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}
