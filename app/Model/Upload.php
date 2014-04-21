 <?php
 CakePlugin::load('FileUpload');
    class Upload extends AppModel {
        var $name = 'Upload';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => 'files',
                        'forceWebroot' => true, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size'),
                        'allowedTypes' => array('pdf' => array('application/pdf')),
                        'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => '10000', //bytes OR false to turn off maxFileSize (default false)
                        'unique' => false, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'sha1' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
    }
?>
