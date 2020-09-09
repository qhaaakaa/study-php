<?php
/**
 * 结构型模式
 *
 * php组合（部分整体）模式
 * 定义：将对象以树形结构组织起来，以达成“部分－整体”的层次结构，使得客户端对单个对象和组合对象的使用具有一致性
 *
 */


// 注册自加载
include "../autoload.php";

/************************************* 组合模式 ********************/

/*
 * 个人理解：是用于把一组相似的对象当作一个单一的对象,组合模式依据树形结构来组合对象
 */

use composite\Folder;
use composite\File;

try {
    // 构建一个根目录
    $root = new Folder('根目录');

    // 根目录下添加一个test.php的文件和usr,mnt的文件夹
    $testFile = new File('test.php');
    $usr = new Folder('usr');
    $mnt = new Folder('mnt');
    $root->add($testFile);
    $root->add($usr);
    $root->add($mnt);
    $usr->add($testFile);// usr目录下加一个test.php的文件

    // 打印根目录文件夹节点
    $root->printComposite();

} catch (\Exception $e) {
    echo $e->getMessage();
}