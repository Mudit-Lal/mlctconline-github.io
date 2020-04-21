<?PHP
/*
Simfatic Forms Main Form processor script

This script does all the server side processing. 
(Displaying the form, processing form submissions,
displaying errors, making CAPTCHA image, and so on.) 

All pages (including the form page) are displayed using 
templates in the 'templ' sub folder. 

The overall structure is that of a list of modules. Depending on the 
arguments (POST/GET) passed to the script, the modules process in sequence. 

Please note that just appending  a header and footer to this script won't work.
To embed the form, use the 'Copy & Paste' code in the 'Take the Code' page. 
To extend the functionality, see 'Extension Modules' in the help.

*/

@ini_set("display_errors", 1);//the error handler is added later in FormProc
error_reporting(E_ALL);

require_once(dirname(__FILE__)."/includes/GST_Individual_Registration-lib.php");
$formproc_obj =  new SFM_FormProcessor('GST_Individual_Registration');
$formproc_obj->initTimeZone('UTC');
$formproc_obj->setFormID('0ac700b3-8e96-4212-b747-4320d4247dfd');
$formproc_obj->setRandKey('298b436d-bf13-4bf1-a706-070e3d2c4a58');
$formproc_obj->setFormKey('ea482390-3eab-4e4c-9129-be8c273d9a66');
$formproc_obj->setLocale('en-US','yyyy-MM-dd');
$formproc_obj->setEmailFormatHTML(true);
$formproc_obj->EnableLogging(false);
$formproc_obj->SetDebugMode(false);
$formproc_obj->setIsInstalled(true);
$formproc_obj->SetPrintPreviewPage(sfm_readfile(dirname(__FILE__)."/templ/GST_Individual_Registration_print_preview_file.txt"));
$formproc_obj->SetSingleBoxErrorDisplay(true);
$formproc_obj->setFormPage(0,sfm_readfile(dirname(__FILE__)."/templ/GST_Individual_Registration_form_page_0.txt"));
$formproc_obj->AddElementInfo('Textbox','text','');
$formproc_obj->AddElementInfo('upload','upload_ex','');
$formproc_obj->setIsInstalled(true);
$formproc_obj->setFormFileFolder('./formdata');
$formproc_obj->SetHiddenInputTrapVarName('t6415e33e3e4dd7faa81d');
$formproc_obj->SetFromAddress('forms@online.mlctc.biz');
$page_renderer =  new FM_FormPageDisplayModule();
$formproc_obj->addModule($page_renderer);

$validator =  new FM_FormValidator();
$validator->addValidation("upload","max_numfiles=2","You can upload only 2 files for this field");
$validator->addValidation("upload","max_filesize=2048","The file size should be less than 2 MB");
$formproc_obj->addModule($validator);

$upld =  new FM_FileUploadHandler();
$upld->SetFileUploadFields(array('upload'));
$formproc_obj->addModule($upld);

$data_email_sender =  new FM_FormDataSender(sfm_readfile(dirname(__FILE__)."/templ/GST_Individual_Registration_email_subj.txt"),sfm_readfile(dirname(__FILE__)."/templ/GST_Individual_Registration_email_body.txt"),'');
$data_email_sender->AddToAddr('Mudit Lal <muditlal02@gmail.com>');
$data_email_sender->SetAttachFiles(true);
$formproc_obj->addModule($data_email_sender);

$tupage =  new FM_ThankYouPage(sfm_readfile(dirname(__FILE__)."/templ/GST_Individual_Registration_thank_u.txt"));
$formproc_obj->addModule($tupage);

$validator->SetFileUploader($upld);
$thumbnail =  new FM_ThumbnailModule();
$formproc_obj->AddExtensionModule($thumbnail);
$data_email_sender->SetFileUploader($upld);
$page_renderer->SetFormValidator($validator);
$page_renderer->SetFileUploader($upld);
$formproc_obj->ProcessForm();

?>