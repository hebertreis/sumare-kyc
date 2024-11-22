<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceiverResource\Pages;
use App\Filament\Resources\ReceiverResource\RelationManagers;
use App\Models\Receiver;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceiverResource extends Resource
{
    protected static ?string $model = Receiver::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Dados de contato')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nome')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('surname')
                                ->label('Sobrenome')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('email')
                                ->label('E-mail')
                                ->required()
                                ->email()
                                ->maxLength(255),
                            Forms\Components\Toggle::make('isRepresentative')
                                ->label('É Representante?')
                                ->required(),
                        ]),
                    Forms\Components\Wizard\Step::make('Sobre a empresa')
                        ->schema([
                            Forms\Components\Select::make('website_platform')
                                ->label('Plataforma do Site')
                                ->required()
                                ->options([
                                    'WordPress' => 'WordPress',
                                    'Shopify' => 'Shopify',
                                    'Wix' => 'Wix',
                                ]),
                            Forms\Components\TextInput::make('social_site')
                                ->label('Site ou Rede Social')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('fantasy_name')
                                ->label('Nome Fantasia')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('business_reason')
                                ->label('Razão Social')
                                ->required()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Wizard\Step::make('Representante da empresa')
                        ->schema([
                            Forms\Components\TextInput::make('representative_name')
                                ->label('Nome do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('representative_fullname')
                                ->label('Sobrenome do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('representative_email')
                                ->label('E-mail do Representante')
                                ->required()
                                ->email()
                                ->maxLength(255),
                            Forms\Components\DatePicker::make('representative_birthdate')
                                ->label('Data de Nascimento do Representante')
                                ->required()
                                ->format('d/m/Y'),
                            Forms\Components\TextInput::make('representative_phone')
                                ->label('Telefone do Representante')
                                ->required()
                                ->maxLength(14),
                            Forms\Components\TextInput::make('representative_income')
                                ->label('Renda Mensal do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('representative_occupation')
                                ->label('Ocupação do Representante')
                                ->required()
                                ->options(function () {
                                    return \App\Models\Ocupacao::pluck('title');
                                })
                                ->searchable(),
                        ]),
                    Forms\Components\Wizard\Step::make('Endereço do representante')
                        ->schema([
                            Forms\Components\TextInput::make('representative_cep')
                                ->label('CEP do Representante')
                                ->required()
                                ->maxLength(9),
                            Forms\Components\TextInput::make('representative_street')
                                ->label('Rua do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('representative_number')
                                ->label('Número da Rua do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('representative_complement')
                                ->label('Complemento do Representante')
                                ->nullable()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('representative_neighborhood')
                                ->label('Bairro do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('representative_city')
                                ->label('Cidade do Representante')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('representative_state')
                                ->label('Estado do Representante')
                                ->required()
                                ->options([
                                    'SP' => 'São Paulo',
                                    'RJ' => 'Rio de Janeiro',
                                    'MG' => 'Minas Gerais',
                                ]),
                            Forms\Components\TextInput::make('representative_reference')
                                ->label('Ponto de Referência do Representante')
                                ->nullable()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Wizard\Step::make('Endereço da empresa')
                        ->schema([
                            Forms\Components\TextInput::make('company_cep')
                                ->label('CEP da Empresa')
                                ->required()
                                ->maxLength(9),
                            Forms\Components\TextInput::make('company_street')
                                ->label('Rua da Empresa')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('company_number')
                                ->label('Número da Rua da Empresa')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('company_complement')
                                ->label('Complemento da Empresa')
                                ->nullable()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('company_neighborhood')
                                ->label('Bairro da Empresa')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('company_city')
                                ->label('Cidade da Empresa')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('company_state')
                                ->label('Estado da Empresa')
                                ->required()
                                ->options([
                                    'SP' => 'São Paulo',
                                    'RJ' => 'Rio de Janeiro',
                                    'MG' => 'Minas Gerais',
                                ]),
                            Forms\Components\TextInput::make('company_reference')
                                ->label('Ponto de Referência da Empresa')
                                ->nullable()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Wizard\Step::make('Onde receber')
                        ->schema([
                            Forms\Components\TextInput::make('bank')
                                ->label('Banco')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('accountType')
                                ->label('Tipo de Conta')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('agency')
                                ->label('Agência')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('agencyDigit')
                                ->label('Dígito da Agência')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('account')
                                ->label('Conta')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('accountDigit')
                                ->label('Dígito da Conta')
                                ->required()
                                ->maxLength(255),
                        ]),
                ])->extraAttributes(['class' => 'custom-wizard-width']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transfer_day')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transfer_interval')
                    ->searchable(),
                Tables\Columns\IconColumn::make('transfer_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('metadata')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('default_bank_account_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('automatic_anticipation_settings_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('register_address_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monthly_income')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('founding_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('site_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trading_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('professional_occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('annual_revenue')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('corporation_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('default_phone_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('main_address_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReceivers::route('/'),
            'create' => Pages\CreateReceiver::route('/create'),
            'edit' => Pages\EditReceiver::route('/{record}/edit'),
        ];
    }
}
