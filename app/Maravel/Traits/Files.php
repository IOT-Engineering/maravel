<?php

namespace App\Maravel\Traits;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

trait Files  
{
    
    public function storeFile($file, $path, $filename=null)
    {
        if($file != null)
        {

            if($filename==null)
            {
                $filename = $file->getClientOriginalName();
            }
         
            Storage::putFileAs($path, $file, $filename);

            return 1;
        }

        return 0;
        
    }
}
