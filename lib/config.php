<?php ($visit) ? ("") : (header('location: /'));?>
<?php
//ͳһǰ�������ļ�

error_reporting(E_ALL^E_NOTICE^E_WARNING);//�������Ҳ����ʼǻ�������µĴ���

$name = sanitize_file_name($_GET["f"]);

/**

�����Ҫͳһ��һ���̶�URL��������Ϊ
$URL = "http://notepad.live";

��������û����ɷ��ʿռ�󶨵����������������Ĭ������
$URL = "http://".$_SERVER["HTTP_HOST"];

**/

$URL = "http://".$_SERVER["HTTP_HOST"];

//�������ݴ���ļ���
$FOLDER = "_tmp";

//�����ʶǰ׺
$pw_tag = "**@_#PassWord**";

	
function sanitize_file_name($filename) {
	//�����Wordpress
	$special_chars = array("?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"", "&", "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}", ".");
	$filename = str_replace($special_chars, '', $filename);
	$filename = preg_replace('/[\s-]+/', '-', $filename);
	$filename = trim($filename, '.-_');
	return $filename;
}

 function randomkeys($length){
	//��ȡa-z������ַ����ĺ���
	$output='';	
	for ($a = 0; $a<$length; $a++) {	
		$output .= chr(mt_rand(97, 122));	
	}	
	return $output;	
}

if (!isset($_GET["f"])) {
	//����û�û���趨URL��׺���������ȡ����ת
	$name=randomkeys(4);
	while (file_exists($FOLDER."/".$name) && strlen($name) < 10) {
		$name=randomkeys(4);
	}
	if (strlen($name) < 10) {
		header("Location: ".$URL."/".$name);
	}
	die();
}
?>