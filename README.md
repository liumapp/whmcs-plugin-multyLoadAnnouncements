# whmcs-plugin-multyLoadAnnouncements
A whmcs addon module , which significance is load multy announcements

### 如何使用
* 安装本插件（安装插件方法：在modules/addons目录下新建一个multyLoadAnnouncements目录，然后将项目文件拷贝进去，在进入后台的插件列表进行激活即可）

* 将要批量移入的文章导出成csv文件，请注意，我们只需要date,annoucement,title三个字段（并且这三个字段的顺序请不要打乱）的内容，具体可以参考data.csv的文件格式。（如何导出csv文件并没有在本项目中有所包含）

* 在系统后台域名后添加如下参数/whmcs/admin/addonmodules.php?module=multyloadannouncement进入模块页面。

* 安装插件后上传csv文件，并点击提交即可自动导入。

### 配置说明

目前只有一个配置项。

1. 是否立即发布；（勾选后批量上传的文章会立即发布到前台）

