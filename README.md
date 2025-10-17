# MediaWiki 扩展：CosPreview

[CosPreview](https://github.com/itfkybb/CosPreview) 是一个用于在 MediaWiki 页面中嵌入腾讯云对象存储（COS）文档预览功能的扩展。它通过 COS 的文档转换服务，将存储在 COS 中的文件（如 Excel、Word、PDF 等）转换为 HTML 预览页面，并直接在 wiki 中显示。

**主要功能**：

- 支持多种文档格式的预览（基于腾讯云 COS 的转换能力）。
- 简单易用的标签语法，只需指定 COS 参数即可嵌入预览。
- 无需额外服务器处理，依赖腾讯云 COS 的 CDN 和转换服务。

## 安装说明

### 前提条件

- 确保您的 MediaWiki 版本兼容（建议 MediaWiki 1.35+）。
- 您需要拥有腾讯云 COS 账户，并已配置存储桶（Bucket）、获取访问 ID 和区域信息。
  1. 开通腾讯云对象存储：https://curl.qcloud.com/YnAsmg0H
  2. 创建【存储桶】![创建存储桶](https://cdn.guohao.asia/picgo/20251017112323691.png-pic)
  3. 
- 在腾讯云 COS 中启用文档预览功能（可能需要额外配置，参考腾讯云文档）。
  - 进入存储桶，开启【文档处理功能】![进入存储桶，开启【文档处理功能】](https://www.guohao.asia/picgo/20251017112532065.png-pic)

### 安装步骤

1. 下载或克隆 CosPreview 扩展代码，将其上传至 MediaWiki 的 `extensions` 目录并解压（如果使用 Git，可克隆到该目录）。

2. 在 MediaWiki 的配置文件 `LocalSettings.php` 中添加以下代码以启用扩展：

   ```php
   wfLoadExtension('CosPreview');
   ```

3. 可选：如果需要全局配置 COS 参数（如默认区域或 ID），可以在 `LocalSettings.php` 中添加额外设置（具体参数请参考扩展文档）。

4. 保存文件并运行 MediaWiki 的更新脚本（例如，通过访问 `https://your-wiki/mw-config/` 或使用命令行工具）。

## 使用说明

### 基本用法

在 MediaWiki 页面的 wikitext 中，使用 `<cospreview>` 标签插入文档预览。标签支持以下属性：

- `id`（必需）：腾讯云 COS 的存储桶 ID 或 CDN 标识符，例如 `"cdn-1253443493"`。
- `path`（必需）：文件在 COS 存储桶中的路径，例如 `"picgo/202411201059195.xlsx"`。
- `region`（必需）：COS 存储桶所在的区域，例如 `"ap-beijing"`（北京区域）。

**示例**：

```XML
<cospreview id="cdn-1253443493" path="picgo/202411201059195.xlsx" region="ap-beijing" />
```

这将在页面中嵌入一个预览区域，显示指定 Excel 文件的内容。

### 参数详解

- **id**：对应腾讯云 COS 存储桶的唯一标识符。您可以在腾讯云控制台的存储桶详情中找到该值。
- **path**：文件的完整路径，包括文件夹和文件名。确保文件已上传到 COS 并具有公共读取权限（或通过 COS 预览服务访问）。
- **region**：COS 存储桶的区域代码，例如 `ap-beijing`（北京）、`ap-shanghai`（上海）等。完整区域列表请参考腾讯云文档。

### 更多示例

- 预览 Word 文档：

  ```XML
  <cospreview id="my-bucket-id" path="documents/report.docx" region="ap-shanghai" />
  ```

- 预览 PDF 文件：

  ```XML
  <cospreview id="cdn-123456789" path="files/manual.pdf" region="ap-guangzhou" />
  ```

### 注意事项

- 确保 COS 文件可公开访问或已配置预览权限，否则预览可能失败。
- 扩展依赖腾讯云 COS 服务，请确保您的 COS 账户余额充足或服务未过期。
- 如果预览不显示，检查 MediaWiki 错误日志或 COS 控制台以排查问题。
- 该扩展仅提供预览嵌入功能，文件上传和管理需通过腾讯云 COS 单独处理。

## 支持与贡献

如果您遇到问题或想贡献代码，请访问 [GitHub 项目页面](https://github.com/itfkybb/CosPreview) 提交 Issue 或 Pull Request。

------

## English Version (For Reference)

# MediaWiki Extension: CosPreview

[CosPreview](https://github.com/itfkybb/CosPreview) is a MediaWiki extension that allows embedding document previews from Tencent Cloud Object Storage (COS). It converts files stored in COS (e.g., Excel, Word, PDF) into HTML previews using COS's document processing service and displays them directly in wiki pages.

**Features**:

- Supports preview for multiple document formats (via Tencent Cloud COS conversion).
- Simple tag-based syntax to embed previews by specifying COS parameters.
- No additional server processing required; relies on Tencent Cloud COS CDN and conversion services.

## Installation

### Prerequisites

- Ensure your MediaWiki version is compatible (recommended: MediaWiki 1.35+).
- You need a Tencent Cloud COS account with a configured bucket, access ID, and region information.
- Enable document preview in Tencent Cloud COS (may require additional setup; refer to Tencent Cloud documentation).

### Steps

1. Download or clone the CosPreview extension code and upload it to the `extensions` directory of your MediaWiki installation, then unzip it (if using Git, clone into this directory).

2. Add the following code to your MediaWiki configuration file `LocalSettings.php` to enable the extension:

   ```php
   wfLoadExtension('CosPreview');
   ```

3. Optional: For global configuration of COS parameters (e.g., default region or ID), add additional settings in `LocalSettings.php` (refer to extension documentation for details).

4. Save the file and run MediaWiki's update script (e.g., via `https://your-wiki/mw-config/` or command-line tools).

## Usage

### Basic Usage

In MediaWiki wikitext, use the `<cospreview>` tag to insert a document preview. The tag supports the following attributes:

- `id` (required): The bucket ID or CDN identifier from Tencent Cloud COS, e.g., `"cdn-1253443493"`.
- `path` (required): The file path within the COS bucket, e.g., `"picgo/202411201059195.xlsx"`.
- `region` (required): The region of the COS bucket, e.g., `"ap-beijing"` (Beijing region).

**Example**:

```XML
<cospreview id="cdn-1253443493" path="picgo/202411201059195.xlsx" region="ap-beijing" />
```

This will embed a preview area in the page showing the content of the specified Excel file.

### Parameter Details

- **id**: The unique identifier for your Tencent Cloud COS bucket. You can find this value in the bucket details in the Tencent Cloud console.
- **path**: The full path to the file, including folders and filename. Ensure the file is uploaded to COS and has public read access (or is accessible via COS preview services).
- **region**: The region code of the COS bucket, e.g., `ap-beijing` (Beijing), `ap-shanghai` (Shanghai). For a full list, refer to Tencent Cloud documentation.

### More Examples

- Preview a Word document:

  ```XML
  <cospreview id="my-bucket-id" path="documents/report.docx" region="ap-shanghai" />
  ```

- Preview a PDF file:

  ```XML
  <cospreview id="cdn-123456789" path="files/manual.pdf" region="ap-guangzhou" />
  ```

### Notes

- Ensure the COS file is publicly accessible or has preview permissions enabled; otherwise, the preview may fail.
- The extension relies on Tencent Cloud COS services; make sure your COS account has sufficient balance and services are active.
- If the preview does not appear, check MediaWiki error logs or the Tencent Cloud console for troubleshooting.
- This extension only provides preview embedding; file upload and management must be handled separately via Tencent Cloud COS.

## Support & Contribution

If you encounter issues or want to contribute, please visit the [GitHub project page](https://github.com/itfkybb/CosPreview) to submit an Issue or Pull Request.
