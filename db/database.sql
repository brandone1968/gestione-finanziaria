create database if not exists gestfin character set utf8 collate utf8_unicode_ci;
use gestfin;

grant all privileges on gestfin.* to 'gestfin_user'@'localhost' identified by 'secret';