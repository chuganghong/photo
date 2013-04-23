<?php
class TopicAction extends CommonAction {
    //过滤查询字段
    function _filter(&$map){
        if(!empty($_POST['name'])) {        	
        $map['topicName'] = array('like',"%".$_POST['name']."%");
        }
    }
}