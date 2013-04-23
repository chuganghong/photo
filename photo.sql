create database photo default character set utf8 collate utf8_general_ci;

use photo;

create table admin
(
	adminId int not null auto_increment primary key,
	adminName char(10) not null,
	adminPwd char(60) not null
);

create table topic
(
	topicId int not null auto_increment primary key,
	topicName char(200) not null,
	create_time int(11) unsigned NOT NULL,
    status tinyint(1) unsigned NOT NULL
);

create table album
(
	albumId int not null auto_increment primary key,
	albumName char(200) not null,#图集名称
	thumbId int not null,  #缩略图的ID
	#albumCover char(200) not null,#图集缩略图url
	topicId int not null,#图集所属的栏目
	createTime timestamp #图集创建时间
);

create table picture   #上传的非缩略图
(
	pictureId int not null auto_increment primary key,
	pictureUrl char(200) not null,  #图片的URL
	albumId int not null   #图片所属的图集
);

create table thumbPic    #图集封面
(
	thumbId int not null auto_increment primary key,
	thumbUrl char(200) not null  #图片的URL
);

grant select,update,delete,insert
on photo.*
to photo@localhost identified by 'password';
	