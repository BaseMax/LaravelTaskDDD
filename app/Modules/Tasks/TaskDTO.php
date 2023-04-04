<?php

namespace App\Modules\Tasks;

use Illuminate\Support\Facades\Validator;

class TaskDTO
{
    private string $title;
    private string $description;

    public function __construct(string $title, string $description)
    {
        Validator::make([
            "title" => $title,
            "description" => $description
        ], [
            'title' => 'required|string|max:300',
            'description' => 'required|string',
        ])->validate();



        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
