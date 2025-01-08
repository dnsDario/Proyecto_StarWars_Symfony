<?php

namespace App\Manager;

use Symfony\Component\HttpFoundation\File\UploadedFile;
/* - Creamor un servicio de subida de archivos que posteriormente usaremos en el controlador
    1. Con el servicio UploadedFile podemos obtener el nombre del archivo subido
    2. Le damos un identificador y extensión al archivo
    3. Creamos el archivo en el directorio especificado
    4. Devolvemos el nombre del archivo
*/
class FilesManager
{
    public function upload(UploadedFile $file, $targetPath){

        $fileName = uniqid() . '.' . $file->guessExtension(); //composer require symfony/mime

        try {
            $file->move($targetPath, $fileName); // primer argumento es el targetPath(carpeta) donde se guardará el archivo, el segundo argumento es el nombre del archivo
        } catch (\Exception $e) {
            throw new \Exception('Error al subir el archivo');
        }

        return $fileName;
    }
}