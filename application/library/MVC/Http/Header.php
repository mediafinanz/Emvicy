<?php
/**
 * Builder.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

class Header
{
    /**
     * @var null
     */
    protected static $_oInstance = null;

    /**
     * Constructor
     */
    protected function __construct()
    {
        ;
    }

    /**
     * @return self|null
     */
    public static function init()
    {
        if (null === self::$_oInstance)
        {
            self::$_oInstance = new self();
        }

        return self::$_oInstance;
    }

    /**
     * @param string $sType
     * @return $this
     */
    public function Content_Type(string $sType = '')
    {
        header('Content-Type: ' . $sType);

        return $this;
    }

    /**
     * @param int $iFilesize
     * @return $this
     */
    public function Content_Length(int $iFilesize = 0)
    {
        header('Content-Length: ' . $iFilesize);

        return $this;
    }

    /**
     * @param string $sFilename
     * @return $this
     */
    public function Content_Disposition_Attachment(string $sFilename = '')
    {
        header('Content-Disposition: attachment; filename=' . urlencode($sFilename));

        return $this;
    }

    /**
     * @return $this
     */
    public function Content_Type_application_download()
    {
        header('Content-Type: application/download');

        return $this;
    }

    /**
     * @return $this
     */
    public function Content_Type_application_force_download()
    {
        header('Content-Type: application/force-download');

        return $this;
    }

    /**
     * @return $this
     */
    public function Content_Type_application_octet_stream()
    {
        header('Content-Type: application/octet-stream');

        return $this;
    }

    /**
     * @return $this
     */
    public function Content_Description_File_Transfer()
    {
        header('Content-Description: File Transfer');

        return $this;
    }
}