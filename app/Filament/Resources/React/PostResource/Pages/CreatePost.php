<?php

namespace App\Filament\Resources\React\PostResource\Pages;

use App\Filament\Resources\React\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
