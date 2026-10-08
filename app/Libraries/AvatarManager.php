<?php

namespace App\Libraries;

use CodeIgniter\HTTP\Files\UploadedFile;

class AvatarManager
{
    public function store(UploadedFile $file, string $collection): string
    {
        $directory = $this->directory($collection);
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = $file->getRandomName();
        $file->move($directory, $filename);

        return $filename;
    }

    public function delete(?string $filename, string $collection): void
    {
        if (! $filename || basename($filename) !== $filename) {
            return;
        }

        $path = $this->directory($collection) . DIRECTORY_SEPARATOR . $filename;
        if (is_file($path)) {
            unlink($path);
        }
    }

    private function directory(string $collection): string
    {
        if (! in_array($collection, ['avatars', 'customers'], true)) {
            throw new \InvalidArgumentException('Unknown avatar collection.');
        }

        return FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $collection;
    }
}
