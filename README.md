# CosPreview
一个用来在MediaWiki上插入经由腾讯云COS转换的预览文档的扩展
# 使用说明

## 安装

1. 上传至`extensions`并解压；


2. 在`LocalSettings.php`中加入以下代码启用扩展：

```
wfLoadExtension('CosPreview');
```

## 使用

```
<cospreview id="cdn-1253443493" path="picgo/202411201059195.xlsx" region="ap-beijing" />
```

# Usage Instructions

## Installation

1. Upload to the `extensions` directory and unzip;

2. Add the following code to `LocalSettings.php` to enable the extension:

```php
wfLoadExtension('CosPreview');
```

## Usage

```
<cospreview id="cdn-1253443493" path="picgo/202411201059195.xlsx" region="ap-beijing" />
```
