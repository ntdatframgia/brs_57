<?php

namespace App\Facades\Process;

class ProcessUpload
{
    public function upload($file, $folderName)
    {
        $name = microtime(true) . '.' . $file->extension();
        $file->storeAs($folderName, $name, 'asset');
        return $name;
    }
}
