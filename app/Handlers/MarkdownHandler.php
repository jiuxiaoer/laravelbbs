<?php

namespace App\Handlers;

use Parsedown;
use League\HTMLToMarkdown\HtmlConverter;

class MarkdownHandler
{
    protected $htmlConverter;

    protected $markdownConverter;

    public function __construct()
    {
        $this->htmlConverter = new HtmlConverter();

        $this->markdownConverter = new Parsedown();
    }

    public function convertMarkdownToHtml($markdown)
    {
        return $this->markdownConverter->setBreaksEnabled(true)->text($markdown);
    }

    public function convertHtmlToMarkdown($html)
    {
        return $this->htmlConverter->convert($html);
    }
}
