<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                ->label('Last Name')
                ->required(),
                Forms\Components\TextInput::make('last_name')
                    ->label('Last Name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->tel()
                    ->required(),
                Forms\Components\DatePicker::make('hire_date')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\Select::make('department')
                    ->options([
                        'accounts'=>'accounts',
                        'ICT'=>'ICT',
                        'procurrement'=>'procurrement',
                        'human_resource'=>'Human Resource',
                        'sales'=>'Sales',
                        'marketing'=>'Marketing',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('job_title')
                    ->label('Job Title')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->label('First Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('last_name')->label('Last Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('phone_number')->label('Phone Number'),
                Tables\Columns\TextColumn::make('hire_date')->label('Hire Date'),
                Tables\Columns\TextColumn::make('department')->label('Department')->toggleable(),
                Tables\Columns\TextColumn::make('job_title')->label('Job Title')->toggleable(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
