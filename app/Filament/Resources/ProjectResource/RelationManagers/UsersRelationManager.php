<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Str;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('user.email'),
                Tables\Columns\TextColumn::make('role.name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\Action::make('generateInvitationLink')
                    ->label('Generate Invitation Link')
                    ->icon('heroicon-o-link')
                    ->modalCancelAction(false)
                    ->modalSubmitAction(false)
                    ->form([
                        Textarea::make('invitationLink')
                            ->label('Invitation Link')
                            ->formatStateUsing(function ($state): string {
                                $project = $this->ownerRecord;

                                // Generate the invitation link
                                $token = Str::random(40);
                                $invitationLink = route('project.invitation', ['token' => $token]);

                                $project->invitations()->create([
                                    'token' => $token,
                                    'expires_at' => now()->addDays(7),
                                ]);

                                return $invitationLink;
                            })
                            ->rows(3)
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->modalHeading('Invitation Link')
                    ->modalWidth('md')
                    ->modalActions([]),
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
