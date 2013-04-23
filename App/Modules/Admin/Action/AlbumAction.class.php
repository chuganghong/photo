<?php

class AlbumAction extends CommonAction {		
	
	public function index()
	{
		echo 'mySelect start<br />';   //test
		$this->mySelect();
		parent::index();
	}
	public function showPic() {
		$Photo  =   M('Picture');
		$data   =   $Photo->order('id desc')->find();
		//var_dump($data);   //test
		$this->assign('data', $data);
		//$this->display();
	}
	
	public function upload() {    	
        if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_upload();
        }
    }
    
    public function mySelect()
    {
    	echo 'mySelect start<br />';   //test
    	$topic = M('Topic');
    	//var_dump($topic);  //test
    	$list = $topic->getField('id,topicName');
    	var_dump($list);   //test
    	$this->assign('mySelect',$list);
    	$this->display();
    }
    
    public function uploadPic()
    {
    	$this->showPic();
    	
    	
    	    	
    	$name = $this->getActionName();
    	var_dump($name);   //test
    	$model = M($name);
    	$id = $_REQUEST [$model->getPk()];
    	var_dump($id);  //test
    	$vo = $model->getById($id);
    	var_dump($vo);   //test
    	$this->assign('vo', $vo);
    	$this->display();
    	
    }
    
    public function addAlbum()
    {
    	$this->mySelect();   //test
    	
    	$this->insert();
    	$this->upload();
    }

    // 文件上传
    protected function _upload() {
        import('@.ORG.Upload.UploadFile');
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = './Uploads/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Upload.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '400,100';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '400,100';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = true;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }
        $model  = M('picture');
        //保存当前数据对象
        $data['pictureUrl']          = $_POST['image'];
        //var_dump($_GET['id']);  //test
        //$id = $_REQUEST [$model->getPk()];
        //var_dump($id);  //test
        $data['albumId']			 = $_POST['id'];
        //var_dump($data['albumId']);    //test
        //$data['create_time']    = NOW_TIME;
        $list   = $model->add($data);
        if ($list !== false) {
            $this->success('上传图片成功！');
        } else {
            $this->error('上传图片失败!');
        }
    }
}