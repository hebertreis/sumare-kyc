<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Receiver;
use App\Models\TransferSetting;
use App\Models\BankAccount;
use App\Models\AutomaticAnticipationSetting;
use App\Models\Address;
use App\Models\RegisterInformation;
use App\Models\Phone;

class CreateReceiver extends Component
{
    public $currentStep = 1;
    public $formData = [
        'name' => '',
        'surname' => '',
        'email' => '',
        'isRepresentative' => '',
        'bank' => '',
        'accountType' => '',
        'agency' => '',
        'agencyDigit' => '',
        'account' => '',
        'accountDigit' => '',
        'cnpj' => '',
        'phone' => '',
        'annual_revenue' => '',
        'website_platform' => '',
        'social_site' => '',
        'fantasy_name' => '',
        'business_reason' => '',
        'representative_name' => '',
        'representative_fullname' => '',
        'representative_email' => '',
        'representative_birthdate' => '',
        'representative_phone' => '',
        'representative_income' => '',
        'representative_occupation' => '',
        'representative_cep' => '',
        'representative_street' => '',
        'representative_number' => '',
        'representative_complement' => '',
        'representative_neighborhood' => '',
        'representative_city' => '',
        'representative_state' => '',
        'representative_reference' => '',
        'company_cep' => '',
        'company_street' => '',
        'company_number' => '',
        'company_complement' => '',
        'company_neighborhood' => '',
        'company_city' => '',
        'company_state' => '',
        'company_reference' => '',
        // ...other fields...
    ];

    protected $rules = [
        'formData.name' => 'required|string',
        'formData.surname' => 'required|string',
        'formData.email' => 'required|email',
        'formData.isRepresentative' => 'required|boolean',
        'formData.bank' => 'required|string',
        'formData.accountType' => 'required|string',
        'formData.agency' => 'required|string',
        'formData.agencyDigit' => 'required|string',
        'formData.account' => 'required|string',
        'formData.accountDigit' => 'required|string',
        'formData.cnpj' => 'required|string|size:18',
        'formData.phone' => 'required|string|size:14',
        'formData.annual_revenue' => 'required|string',
        'formData.website_platform' => 'required|string',
        'formData.social_site' => 'required|string',
        'formData.fantasy_name' => 'required|string',
        'formData.business_reason' => 'required|string',
        'formData.representative_name' => 'required|string',
        'formData.representative_fullname' => 'required|string',
        'formData.representative_email' => 'required|email',
        'formData.representative_birthdate' => 'required|date_format:d/m/Y',
        'formData.representative_phone' => 'required|string|size:14',
        'formData.representative_income' => 'required|string',
        'formData.representative_occupation' => 'required|string',
        'formData.representative_cep' => 'required|string|size:9',
        'formData.representative_street' => 'required|string',
        'formData.representative_number' => 'required|string',
        'formData.representative_complement' => 'nullable|string',
        'formData.representative_neighborhood' => 'required|string',
        'formData.representative_city' => 'required|string',
        'formData.representative_state' => 'required|string',
        'formData.representative_reference' => 'nullable|string',
        'formData.company_cep' => 'required|string|size:9',
        'formData.company_street' => 'required|string',
        'formData.company_number' => 'required|string',
        'formData.company_complement' => 'nullable|string',
        'formData.company_neighborhood' => 'required|string',
        'formData.company_city' => 'required|string',
        'formData.company_state' => 'required|string',
        'formData.company_reference' => 'nullable|string',
        // ...other rules...
    ];

    protected $messages = [
        'formData.name.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.surname.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.email.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.email.email' => 'Endereço de email incorreto, use o formato seuemail@email.com.br.',
        'formData.isRepresentative.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.bank.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.accountType.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.agency.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.agencyDigit.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.account.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.accountDigit.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.cnpj.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.cnpj.size' => 'Não encontramos este CNPJ, verifique os números e tente novamente.',
        'formData.phone.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.phone.size' => 'Número de telefone não encontrado.',
        'formData.annual_revenue.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.website_platform.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.social_site.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.fantasy_name.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.business_reason.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_name.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_fullname.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_email.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_email.email' => 'Endereço de email incorreto, use o formato seuemail@email.com.br.',
        'formData.representative_birthdate.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_birthdate.date_format' => 'A data informada não existe.',
        'formData.representative_phone.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_phone.size' => 'Número de telefone não encontrado.',
        'formData.representative_income.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_occupation.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_cep.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_cep.size' => 'Não encontramos este CEP.',
        'formData.representative_street.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_number.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_neighborhood.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_city.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.representative_state.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.company_cep.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.company_cep.size' => 'Não encontramos este CEP.',
        'formData.company_street.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.company_number.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.company_neighborhood.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.company_city.required' => 'Precisamos desta informação para o seu cadastro.',
        'formData.company_state.required' => 'Precisamos desta informação para o seu cadastro.',
        // ...other messages...
    ];

    public $steps = [
        ['id' => 1, 'name' => 'Dados de contato', 'completed' => false],
        ['id' => 2, 'name' => 'Sobre a empresa', 'completed' => false],
        ['id' => 3, 'name' => 'Representante da empresa', 'completed' => false],
        ['id' => 4, 'name' => 'Endereço do representante', 'completed' => false],
        ['id' => 5, 'name' => 'Endereço da empresa', 'completed' => false],
        ['id' => 6, 'name' => 'Onde receber', 'completed' => false],
    ];

    public function mount()
    {
        $this->updateSteps();
    }

    public function updatedCurrentStep()
    {
        $this->updateSteps();
    }

    public function updateSteps()
    {
        foreach ($this->steps as &$step) {
            $step['completed'] = $step['id'] < $this->currentStep;
        }
    }

    public function prevStep()
    {
        $this->currentStep = max(1, $this->currentStep - 1);
    }

    public function nextStep()
    {
        $this->currentStep = min(count($this->steps), $this->currentStep + 1);
    }

    public function submit()
    {
        // $this->validate();
        // // Save data to models
        // // ...existing code...
        // session()->flash('message', 'Receiver cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.pages.receivers.steps.public-create')->layout('layouts.guest');
    }
}