# 使用说明

## 安装

1. 上传至`extensions`并解压；

2. 在本地MediaWiki中搜索`MediaWiki:Common.css`，将以下CSS填入页面：

   ```
   .responsive-iframe {
       width: 100%; /* 宽度自适应 */
       height: 100vh; /* 高度设置为视窗高度 */
       border: none;
   }
   ```
3. 在`LocalSettings.php`中加入以下代码启用扩展：

```
wfLoadExtension('PreviewLink');
```

## 使用

```
<cospreview id="cdn-1253443493" path="picgo/202411201059195.xlsx" region="ap-beijing" />
```

# Usage Instructions

## Installation

1. Upload to the `extensions` directory and unzip;

2. Search for `MediaWiki:Common.css` in your local MediaWiki, and add the following CSS to the page:

   ```
   .responsive-iframe {
       width: 100%; /* Full width responsiveness */
       height: 100vh; /* Height set to viewport height */
       border: none;
   }
   ```

3. Add the following code to `LocalSettings.php` to enable the extension:

```php
wfLoadExtension('PreviewLink');
```

## Usage

```
<cospreview id="cdn-1253443493" path="picgo/202411201059195.xlsx" region="ap-beijing" />
```
