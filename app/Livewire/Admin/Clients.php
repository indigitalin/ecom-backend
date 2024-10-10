<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{User, Client, State};
use Illuminate\Support\Facades\DB;
use Exception;

class Clients extends Component
{
    public $clients, $clientId, $userId, $firstname,
        $lastname, $email, $password, $phone,
        $business_name, $industry, $description,
        $address, $city, $state_id, $country_id,
        $plan_id;

    public $isUpdateMode = false;
    public $states = [];

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'phone' => 'required',
        'business_name' => 'required',
        'industry' => 'required',
        'description' => 'nullable',
        'address' => 'required',
        'city' => 'required',
        'state_id' => 'required|exists:states,id',
        // 'country_id' => 'required|exists:countries,id',
        // 'plan_id' => 'required|exists:plans,id',
    ];

    public function render()
    {
        $this->clients = Client::with('user')->get();
        $this->states  = State::whereStatus(1)->get()->pluck('name', 'id');
        return view('livewire.admin.clients.index');
    }

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->business_name = '';
        $this->industry = '';
        $this->description = '';
        $this->address = '';
        $this->city = '';
        $this->state_id = '';
        $this->country_id = '';
        $this->plan_id = '';
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $user = User::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'phone' => $this->phone,
            ]);

            Client::create([
                'user_id' => $user->id, // Link client with the user
                'business_name' => $this->business_name,
                'industry' => $this->industry,
                'description' => $this->description,
                'address' => $this->address,
                'city' => $this->city,
                'state_id' => $this->state_id,
                'country_id' => $this->country_id ?? 1,
                'plan_id' => $this->plan_id ?? 1,
            ]);

            session()->flash('message', 'Client Created Successfully.');

            $this->resetInputFields();
            $this->dispatch('clientStored');
            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();
            session()->flash('error', 'Client Creation some error ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $client = Client::with('user')->findOrFail($id);

        $this->clientId = $client->id;
        $this->userId = $client->user->id;

        // Fill client data
        $this->business_name = $client->business_name;
        $this->industry = $client->industry;
        $this->description = $client->description;
        $this->address = $client->address;
        $this->city = $client->city;
        $this->state_id = $client->state_id;
        $this->country_id = $client->country_id;
        $this->plan_id = $client->plan_id;

        // Fill user data
        $this->firstname = $client->user->firstname;
        $this->lastname = $client->user->lastname;
        $this->email = $client->user->email;
        $this->phone = $client->user->phone;

        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'business_name' => 'required',
            'industry' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'plan_id' => 'required|exists:plans,id',
        ]);

        if ($this->clientId) {
            // Update User
            $user = User::find($this->userId);

            DB::beginTransaction();
            try {
                $user->update([
                    'firstname' => $this->firstname,
                    'lastname' => $this->lastname,
                    'email' => $this->email,
                    'password' => $this->password ? bcrypt($this->password) : $user->password,
                    'phone' => $this->phone,
                ]);

                // Update Client
                $client = Client::find($this->clientId);
                $client->update([
                    'business_name' => $this->business_name,
                    'industry' => $this->industry,
                    'description' => $this->description,
                    'address' => $this->address,
                    'city' => $this->city,
                    'state_id' => $this->state_id,
                    'country_id' => $this->country_id,
                    'plan_id' => $this->plan_id,
                ]);

                session()->flash('message', 'Client Updated Successfully.');

                $this->resetInputFields();
                $this->isUpdateMode = false;
                $this->dispatch('clientStored');
                DB::commit();
            } catch (Exception $e) {

                DB::rollBack();
                session()->flash('error', 'Client Updation some error ' . $e->getMessage());
            }
        }
    }

    public function delete($id)
    {
        $client = Client::find($id);

        DB::beginTransaction();
        try {
            if ($client->user) {
                $client->user->delete();
            }

            $client->delete();

            session()->flash('message', 'Client Deleted Successfully.');
        } catch (Exception $e) {

            DB::rollBack();
            session()->flash('error', 'Client Deletion some error ' . $e->getMessage());
        }
    }
}
