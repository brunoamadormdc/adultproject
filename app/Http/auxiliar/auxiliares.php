<?php

namespace App\Http\auxiliar;



class auxiliares
{
    public function testImage($req) {
        $size = $req->getSize();
        
        $mimetype = $req->getMimeType();
      
        if ($mimetype != 'image/png' && $mimetype != 'image/jpeg') {
            return 'extensao';
        }
        else {
            
            if ($size > 5000000) {
                return "tamanho";
            }
            else {
                return 'valid';
            }
        }
    }

    public function testvideo($req) {
        $size = $req->getSize();
        
        $mimetype = $req->getMimeType();
      
        if ($mimetype != 'video/x-flv' && $mimetype != 'video/mp4' && $mimetype != 'application/x-mpegURL' && $mimetype != 'video/MP2T' && $mimetype != 'video/quicktime' && $mimetype != 'video/x-msvideo' && $mimetype != 'video/x-ms-wmv') {
        
            return 'extensao';
        }
        else {
            
            if ($size > 30000000) {
                
                return "tamanho";
            }
            else {
                return 'valid';
            }
        }
    }


        
    
}
