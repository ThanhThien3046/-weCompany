<?php
if (session_id() == '') {
    @session_start();
}
/*
 * CKFinder Configuration File
 *
 * For the official documentation visit https://ckeditor.com/docs/ckfinder/ckfinder3-php/
 */

/*============================ PHP Error Reporting ====================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/debugging.html

// Production
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0);

// Development
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/*============================ General Settings =======================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html

$config = array();

/*============================ Enable PHP Connector HERE ==============================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_authentication

$config['authentication'] = function () {
    $user = $_SESSION['user'];
    if($user){
        return true;
    }
    return false;
};

/*============================ License Key ============================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_licenseKey

$license = [
    [   
        'licenseName' => 'blog.ebudezain.com',
        'licenseKey'  => '*K?M-*1**-C**6-*C**-*5**-H*L*-2**B'
    ],
    [   
        'licenseName' => 'blog.ebudezain.dev.com',
        'licenseKey'  => '*4?6-*1**-F**4-*F**-*H**-F*7*-3**L'
    ],
    [   
        'licenseName' => 'ebudezain.com',
        'licenseKey'  => 'E636G5GV316DY4W5XJQ1H9865QSMT'
    ],
];
$activeLicense = [   'licenseName' => '', 'licenseKey'  => ''];
foreach($license as $key=>$value){
    if($value['licenseName'] == $_SERVER['SERVER_NAME']){
        $activeLicense['licenseName'] = $value['licenseName'];
        $activeLicense['licenseKey'] = $value['licenseKey'];
    }
}
$config['licenseName'] = $activeLicense['licenseName'];
$config['licenseKey']  = $activeLicense['licenseKey'];

/*============================ CKFinder Internal Directory ============================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_privateDir

$config['privateDir'] = array(
    'backend' => 'default',
    'tags'   => '.ckfinder/tags',
    'logs'   => '.ckfinder/logs',
    'cache'  => '.ckfinder/cache',
    'thumbs' => '.ckfinder/cache/thumbs',
);

/*============================ Images and Thumbnails ==================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_images

$config['images'] = array(
    'maxWidth'  => 1600,
    'maxHeight' => 1200,
    'quality'   => 80,
    'sizes' => array(
        'small'  => array('width' => 480, 'height' => 320, 'quality' => 80),
        'medium' => array('width' => 600, 'height' => 480, 'quality' => 80),
        'large'  => array('width' => 800, 'height' => 600, 'quality' => 80),
        'banner'  => array('width' => 720, 'height' => 660, 'quality' => 80),
        'product'  => array('width' => 720, 'height' => 960, 'quality' => 80),
        'background-theme'  => array('width' => 160, 'height' => 100, 'quality' => 80),
    )
);

/*=================================== Backends ========================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_backends

$config['backends'][] = array(
    'name'         => 'default',
    'adapter'      => 'local',
    'baseUrl'      => '/upload',
//  'root'         => '', // Can be used to explicitly set the CKFinder user files directory.
    'chmodFiles'   => 0777,
    'chmodFolders' => 0755,
    'filesystemEncoding' => 'UTF-8',
);

/*================================ Resource Types =====================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_resourceTypes

$config['defaultResourceTypes'] = '';

$config['resourceTypes'][] = array(
    'name'              => 'Files', // Single quotes not allowed.
    'directory'         => 'files',
    'maxSize'           => 0,
    'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,docx,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pptx,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,xlsx,zip',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Images',
    'directory'         => 'images',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

/*================================ Access Control =====================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_roleSessionVar

$config['roleSessionVar'] = 'CKFinder_UserRole';

// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_accessControl
$user = $_SESSION['user'];
if($user['role_id'] == 1 ){
    /// supper admin
    $config['accessControl'][] = Array(
        'role'                => '*',
        'resourceType'        => '*',
        'folder'              => '/',
    
        'FOLDER_VIEW'        => true,
        'FOLDER_CREATE'      => true,
        'FOLDER_RENAME'      => true,
        'FOLDER_DELETE'      => true,
    
        'FILE_VIEW'          => true,
        'FILE_CREATE'        => true,
        'FILE_RENAME'        => true,
        'FILE_DELETE'        => true,
    
        'IMAGE_RESIZE'        => true,
        'IMAGE_RESIZE_CUSTOM' => true
    );
}else{
    $config['accessControl'][] = Array(
        'role'         => '*',
        'resourceType' => '*',
        'folder'       => '/',
    
        'FOLDER_VIEW'        => true,
        'FOLDER_CREATE'      => true,
        'FOLDER_RENAME'      => false,
        'FOLDER_DELETE'      => false,
    
        'FILE_VIEW'          => true,
        'FILE_CREATE'        => false,
        'FILE_RENAME'        => false,
        'FILE_DELETE'        => false,
    
        'IMAGE_RESIZE'        => false,
        'IMAGE_RESIZE_CUSTOM' => false
    );
    //// admin role 2
    list($userFolderRole, $ext) = explode('@', $user['email']);
    //Name of our directory
    $dir_name = __DIR__ . "/../upload/images/_$userFolderRole/";
    if (!is_dir($dir_name)) {
        
        mkdir($dir_name, 0777, true);
    }

    $config['accessControl'][] = array(
        'role'                => '*',
        'resourceType'        => '*',
        'folder'              => '/_' . $userFolderRole,

        'FOLDER_VIEW'         => true,
        'FOLDER_CREATE'       => true,
        'FOLDER_RENAME'       => true,
        'FOLDER_DELETE'       => true,

        'FILE_VIEW'           => true,
        'FILE_CREATE'         => true,
        'FILE_RENAME'         => true,
        'FILE_DELETE'         => true,

        'IMAGE_RESIZE'        => true,
        'IMAGE_RESIZE_CUSTOM' => true
    );
}


/*================================ Other Settings =====================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html

$config['overwriteOnUpload'] = false;
$config['checkDoubleExtension'] = true;
$config['disallowUnsafeCharacters'] = false;
$config['secureImageUploads'] = true;
$config['checkSizeAfterScaling'] = true;
$config['htmlExtensions'] = array('html', 'htm', 'xml', 'js');
$config['hideFolders'] = array('.*', 'CVS', '__thumbs');
$config['hideFiles'] = array('.*');
$config['forceAscii'] = false;
$config['xSendfile'] = false;

// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_debug
$config['debug'] = false;

/*==================================== Plugins ========================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_plugins

$config['pluginsDirectory'] = __DIR__ . '/plugins';
$config['plugins'] = array();

/*================================ Cache settings =====================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_cache

$config['cache'] = array(
    'imagePreview' => 24 * 3600,
    'thumbnails'   => 24 * 3600 * 365,
    'proxyCommand' => 0
);

/*============================ Temp Directory settings ================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_tempDirectory

$config['tempDirectory'] = sys_get_temp_dir();


/*============================ Session Cause Performance Issues =======================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_sessionWriteClose

$config['sessionWriteClose'] = true;

/*================================= CSRF protection ===================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_csrfProtection

$config['csrfProtection'] = true;

/*===================================== Headers =======================================*/
// https://ckeditor.com/docs/ckfinder/ckfinder3-php/configuration.html#configuration_options_headers

$config['headers'] = array();

/*============================== End of Configuration =================================*/

// Config must be returned - do not change it.
return $config;
