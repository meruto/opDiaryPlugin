<?php
$options = array('form' => array($form));
$title = __('Edit the diary');
$options['url'] = 'diary/update?id='.$diary->getId();
$options['button'] = __('Save');
$options['isMultipart'] = true;
include_box('formDiary', $title, '', $options);
?>
