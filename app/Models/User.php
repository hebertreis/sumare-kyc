<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * This class represents a contract for the Filament system.
     * It defines the structure and behavior of a Filament contract.
     *
     * @package FilamentSystem
     * @category Contracts
     * @version 1.0
     * @since 2023-10-01
     *
     * @property int $id The unique identifier for the contract.
     * @property string $name The name of the contract.
     * @property string $description A brief description of the contract.
     * @property \DateTime $startDate The start date of the contract.
     * @property \DateTime $endDate The end date of the contract.
     * @property float $amount The monetary value of the contract.
     *
     * @method void activate() Activates the contract.
     * @method void deactivate() Deactivates the contract.
     * @method bool isActive() Checks if the contract is currently active.
     * @method void renew(\DateTime $newEndDate) Renews the contract with a new end date.
     *
     * @example
     * $contract = new FilamentContract();
     * $contract->name = "New Contract";
     * $contract->description = "This is a new contract.";
     * $contract->startDate = new \DateTime('2023-10-01');
     * $contract->endDate = new \DateTime('2024-10-01');
     * $contract->amount = 1000.00;
     * $contract->activate();
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@cre8tecnologia.com.br') && $this->hasVerifiedEmail();
    }
}
