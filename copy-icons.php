<?php

$sourceDirs = [
    'solid' => __DIR__ . '/node_modules/flowbite-icons/src/solid',
    'outline' => __DIR__ . '/node_modules/flowbite-icons/src/outline',
];

$targetBaseDir = __DIR__ . '/resources/views/icons';

foreach ($sourceDirs as $style => $sourceDir) {
    $targetDir = $targetBaseDir . '/' . $style;

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $files = glob($sourceDir . '/*.svg');

    foreach ($files as $file) {
        $filename = basename($file, '.svg') . '.blade.php';
        $targetFile = $targetDir . '/' . $filename;

        $svgContent = file_get_contents($file);

        // Xóa <?xml ...> nếu có
        $svgContent = preg_replace('/<\?xml.*?\?>/', '', $svgContent);

        // Thêm class="w-6 h-6" vào thẻ <svg>
        $svgContent = preg_replace(
            '/<svg\b(?![^>]*class=)/',
            '<svg class="w-6 h-6"',
            $svgContent,
            1
        );

        file_put_contents($targetFile, trim($svgContent));
    }

    echo "✅ Copied " . count($files) . " icons to $targetDir\n";
}

echo "🎉 Done! All icons copied to resources/views/icons/\n";
