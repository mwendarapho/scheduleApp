<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveResource\Pages;
use App\Models\Employee;
use App\Models\Leave;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LeaveResource extends Resource
{
    protected static ?string $model = Leave::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->label('Employee')
                    ->options(Employee::all()->pluck('first_name','id'))->searchable(),
                Forms\Components\Select::make('leave_type')
                    ->label('Leave Type')
                    ->options([
                        'vacation' => 'vacation',
                        'sick_leave' => 'sick_leave',
                        'personal_leave' => 'personal_leave',
                    ]),
                Forms\Components\DatePicker::make('start_date')->label('Start Date'),
                Forms\Components\DatePicker::make('end_date')->label('End Date')
                    ->afterOrEqual('start_date'),
                Forms\Components\TextInput::make('reason'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'pending',
                        'approved' => 'approved',
                        'denied' => 'denied',
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.first_name')
                    ->label('First Name'),
                Tables\Columns\TextColumn::make('employee.last_name')
                    ->label('Last Name'),
                Tables\Columns\TextColumn::make('leave_type')
                    ->label('Leave Type'),
                Tables\Columns\TextColumn::make('start_date')->dateTime()
                    ->label('Start Date'),
                Tables\Columns\TextColumn::make('end_date')->dateTime()
                    ->label('End Date'),
                Tables\Columns\TextColumn::make('reason')
                    ->label('Reason'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        //'pending' => 'gray',
                        'pending' => 'warning',
                        'approved' => 'success',
                        'denied' => 'danger',
                    }),

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
            'index' => Pages\ListLeaves::route('/'),
            'create' => Pages\CreateLeave::route('/create'),
            'edit' => Pages\EditLeave::route('/{record}/edit'),
        ];
    }
}
