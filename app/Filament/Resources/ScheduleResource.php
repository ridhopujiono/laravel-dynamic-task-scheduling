<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('command')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('frequency')
                    ->options([
                        'everySecond' => 'Every Second',
                        'everyMinute' => 'Every Minute',
                        'everyHour' => 'Every Hour',
                        'daily' => 'Every Day',
                    ])
                    ->disabled(fn(Get $get) => filled($get('days')))
                    ->reactive(),
                Forms\Components\Select::make('days')
                    ->options([
                        'mondays' => 'Every Monday',
                        'tuesdays' => 'Every Tuesday',
                        'wednesdays' => 'Every Wednesday',
                        'thursdays' => 'Every Thursday',
                        'fridays' => 'Every Friday',
                        'saturdays' => 'Every Saturday',
                        'sundays' => 'Every Sunday',
                    ])
                    ->multiple()
                    ->reactive()
                    ->disabled(fn(Get $get) => filled($get('frequency'))),
                Forms\Components\TextInput::make('time')
                    ->maxLength(5),
                Forms\Components\Checkbox::make('active')
                    ->inline(false)
                    ->default(true),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('command')
                    ->searchable(),
                Tables\Columns\TextColumn::make('frequency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('days')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('active')

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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
