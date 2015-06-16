<?php namespace BackupManager\Tasks\Compression;

use BackupManager\Tasks\Task;
use BackupManager\Compressors\Compressor;
use BackupManager\ShellProcessing\ShellProcessor;

/**
 * Class CompressFile
 * @package BackupManager\Tasks\Compression
 */
class CompressFile implements Task {

    /**
     * @var
     */
    private $sourcePath;
    /**
     * @var \BackupManager\ShellProcessing\ShellProcessor
     */
    private $shellProcessor;
    /**
     * @var \BackupManager\Compressors\Compressor
     */
    private $compressor;

    /**
     * @param Compressor $compressor
     * @param $sourcePath
     * @param ShellProcessor $shellProcessor
     */
    public function __construct(Compressor $compressor, $sourcePath, ShellProcessor $shellProcessor) {
        $this->compressor = $compressor;
        $this->sourcePath = $sourcePath;
        $this->shellProcessor = $shellProcessor;
    }

    /**
     * @throws \BackupManager\ShellProcessing\ShellProcessFailed
     */
    public function execute() {
        return $this->shellProcessor->process($this->compressor->getCompressCommandLine($this->sourcePath));
    }
}
